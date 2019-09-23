<?php

namespace App\Http\Controllers;

use App\Search;
use App\Video;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;

class SearchController extends Controller
{

    public function __construct()
    {
    }

    public function home()
    {
        $keys = Search::limit(20)->orderBy('id','DESC')->get();
        $videos = Video::limit(20)->orderBy('id','DESC')->get();

        return view('home', compact('keys', 'videos'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $limit = (int)($request->input('limit') ?? 25);
        $google_key = env('GOOGLE_KEY');

        $data = [];
        $videos = [];

        if ($q && $limit) {

            $search = Search::firstOrCreate(
                ['query' => $q]
            );

            $local_videos = $search->videos()->limit($limit)->get();
            $data['local_videos'] = $local_videos;

            $temp_ids = [];
            foreach ($local_videos as $video) {
                $temp_ids[] = $video['videoId'];
            }

            $client = new Google_Client();
            $client->setDeveloperKey($google_key);
            $youtube = new Google_Service_YouTube($client);

            try {
                $result = $youtube->search->listSearch(
                    'id,snippet',
                    [
                        'q' => $q,
                        'maxResults' => $limit
                    ]
                );

                foreach ($result['items'] as $item) {
                    if ($item['id']['kind'] == 'youtube#video') {

                        $fields = [
                            'videoId' => $item['id']['videoId'],
                            'title' => $item['snippet']['title'],
                            'description' => $item['snippet']['description']
                        ];

                        $video = Video::where('videoId', $fields['videoId'])->firstOrCreate($fields);
                        $search->videos()->attach($video);

                        if (!in_array($fields['videoId'], $temp_ids)) {
                            $videos[] = $video;
                        }
                    }
                }
            } catch (\Exception $e) {
                dd($e);
            }
            $data['videos'] = $videos;
        }

        return view('search', compact('local_videos', 'videos'));
    }

    public function watch(Request $request)
    {
        $v = $request->input('v');

        if (strlen($v) === 11) {
            return view('watch', compact('v'));
        }
        else {
            return 'Ошибка';
        }
    }

}
