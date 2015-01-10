<?php 

/**
 * [console 打印内容到日志]
 * @return [type] [description]
 */
function console()
{
    foreach (func_get_args() as $k => $v) {
        Log::info($v);
    }
}
