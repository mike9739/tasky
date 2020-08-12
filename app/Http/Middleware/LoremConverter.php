<?php

namespace App\Http\Middleware;

use Closure;

class LoremConverter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    const LOREM = ["lorem","ipsum","dolor","sit","amet","consectetur","adipiscing","elit","blandit,","lobortis","varius","ligula","dignissim","ante","ac","etiam,","vehicula","nulla","porta","aenean","habitant","commodo","conubia","placerat","interdum","rutrum","enim","phasellus","donec","congue","scelerisque","euismod","porttitor","erat","sagittis","natoque,","hac","dictumst","hendrerit","auctor","nullam","condimentum","varius","mauris","in","dapibus","quis","et","tempor","per","primis","vel","arcu","malesuada","purus","conubia,","parturient","aenean","lacus","nam","phasellus","tellus","quis","justo,","morbi","nisl","vivamus","interdum","odio","sagittis","tortor","cum","eros","neque","torquent","penatibus","fermentum","augue","nostra","mauris,","vestibulum","facilisis","fames","interdum","per","aliquet","imperdiet","torquent","sagittis","primis","sem","nascetur","urna","arcu","montes","magna","inceptos","taciti,","pulvinar","ante","in","mollis","faucibus","est","leo","eros","cras","at","tortor,","litora","quam","magnis","dui","facilisis","eget","odio","et","nibh","eleifend","faucibus","donec","ac","convallis","nam","lectus","ultricies","bibendum","ante","nisi","ultrices","phasellus","mollis","suscipit,","vulputate","odio","nec","congue","risus","vel","dapibus","elementum","neque","velit","augue","nostra"];

    public function handle($request, Closure $next)
    {
        if(true) return $next($request);
        // https://github.com/HTMLMin/Laravel-HTMLMin
        $response = $next($request);
        $html = $response->getContent();
        $html = preg_replace_callback("/(<[^<>]*>|)([^<>]*)(<[^<>]*>|)/", array($this, 'lorem_replace'), $html);
        $response->setContent($html);

        return $response;
    }

    private function lorem_replace($match){
        $tt = $match[2];
        if(!ctype_space($tt)){
            $rand = hexdec((int) md5($tt)) + strlen($tt);
            srand($rand);
            $words_arr = array_filter(explode(" ", $tt), 'strlen');
            $words = implode(" ", $words_arr);

            $tt = [];
            while(strlen(implode(" ", $tt)) < strlen($words)){
                $tt[] = self::LOREM[array_rand(self::LOREM)];
            }

            $tt = implode(" ", $tt);
        }
        return $match[1] . $tt .$match[3];
    }
}
