<?php
/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
  $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}
/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
  return starts_with($mimeType, 'image/');
}
function is_download_file($mimeType)
{
  $data=array('application'=>'application/','audio'=>'audio/','video'=>'video/');
  return starts_with($mimeType, $data);
}
function lastSql()
{
  $sql = DB::getQueryLog();
  $query = end($sql);
  return $query;
}
function format_json_message($messages, $json)
{
  $reason = format_message($messages);
  $info = '失败原因为：'.$reason;
  $json = array_replace($json, ['info' => $info]);
  return $json;
}
function format_message($messages)
{
  $reason = ' ';
  foreach ($messages->all('<span class="text_error">:message</span>') as $message) {
    $reason .= $message.' ';
  }
  return $reason;
}
function zkhyh($str)
{
  return str_replace(array("[","]","\"","\\"),"",$str);
}

function format_date($time)
{
  $datatime=strtotime($time);
  $t=time()-$datatime;
  $f=array(
      '31536000'=>'年',
      '2592000'=>'个月',
      '604800'=>'星期',
      '86400'=>'天',
      '3600'=>'小时',
      '60'=>'分钟',
      '1'=>'秒'
  );
  foreach ($f as $k=>$v)
  {
    if (0 !=$c=floor($t/(int)$k))
    {
      return $c.$v.'前';
    }
  }
}