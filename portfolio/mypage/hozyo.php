<?php
if(isset($post) == true)
{
    $rec = $post;
}

if(empty($rec['task']) == false)
{
    $task = trim($rec['task']);
}
else
{
    $task=null;
}
if(empty($rec['bytime1']) == false)
{
    $bytime1 = $rec['bytime1'];
}
else
{
    $bytime1 = null;
}
if(empty($rec['bytime2']) == false)
{
    $bytime2 = $rec['bytime2'];
}
else
{
    $bytime2 = null;
}
if(empty($rec['emotion']) == false)
{
    $emotion = $rec['emotion'];
}
else
{
    $emotion = null;
}
if (empty($rec['time1']) == false)
{
    $time1 = $rec['time1'];
}
else
{
    $time1 = null;
}
if (empty($rec['time2']) == false)
{
    $time2 = $rec['time2'];
}
else
{
    $time2 = null;
}
if (empty($rec['attention']) == false)
{
    $attention = trim($rec['attention']);
}
else
{
    $attention = null;
}
if (empty($rec['strong1']) == false)
{
    $strong1 = trim($rec['strong1']);
}
else
{
    $strong1 = null;
}
if (empty($rec['strong2']) == false)
{
    $strong2 = trim($rec['strong2']);
}
else
{
    $strong2=null;
}
if (empty($rec['strong3']) == false)
{
    $strong3 = trim($rec['strong3']);
}
else
{
    $strong3 = null;
}
