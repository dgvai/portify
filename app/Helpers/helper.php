<?php

    use Intervention\Image\ImageManagerStatic as Image;

    function slugify(string $string, string $delimeters = '-') 
    {
        return strtolower(preg_replace('/\s+|\/+/u', $delimeters, trim($string)));
    }

    function deslugify(string $string, string $delimeters = '-')
    {
        return ucwords(str_replace($delimeters, ' ', $string));
    }

    function makeSlug(int $count, string $slug)
    {
        return strtolower(($count == 0) ? $slug : $slug.'-'.$count);
    }

    function objectify(array $array)
    {
        return json_decode(json_encode($array));
    }

    function filename(string $type='image',string $ext='.jpg', string $extra=null, string $meta='PTFY')
    {
        return $meta.'-'.$type.'-'.(!is_null($extra) ? $extra.'-' : '' ).rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$ext;
    }

    function updateEnv(array $data = []) 
    {
        if (count($data) > 0) 
        {
            $env = file_get_contents(base_path().'/.env');
            $env = preg_split('/(\r\n|\n|\r)/', $env);;

            foreach((array) $data as $key => $value) 
            {
                foreach($env as $env_key => $env_value) 
                {
                    $entry = explode("=", $env_value, 2);

                    if ($entry[0] == $key) 
                    {
                        $env[$env_key] = $key."=\"".$value."\"";
                    } else 
                    {
                        $env[$env_key] = $env_value;
                    }
                }
            }

            $env = implode("\n", $env);
            file_put_contents(base_path().'/.env', $env);
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function thumbnail($file, $path, $name, $width = 100, $height = null)
    {
        $image = Image::make($file)->fit($width, is_null($height) ? $width : $height, function ($c) {
            $c->upsize();
        });
        $image->save($path.'/'.$name);
        return $name;
    }

    function resize($file, $path, $name, $width = 300)
    {
        $image = Image::make($file)->resize($width, null, function ($c) {
            $c->aspectRatio();
        });
        $image->save($path.'/'.$name);
        return $name;
    }

    function resizeCanvas($file, $path, $name, $size = 600)
    {
        $background = Image::canvas($size,$size);
        $image = Image::make($file)->resize($size, $size, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/'.$name);
        return $name;
    }