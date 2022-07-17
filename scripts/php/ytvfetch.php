<?php 
$API_Key    = 'AIzaSyCmyeCGIIXf_Jf25NWbYGXscHXL081yZjk'; 
$Channel_ID = 'UC9Z3ZrgSyFA75VQ5HpqSbtA'; 
$Max_Results = 20; 
 $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.''); 
if($apiData){ 
    $videoList = json_decode($apiData); 
}else{ 
    echo 'Invalid API key or channel ID.'; 
}
if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        if(isset($item->id->videoId)){ 
            echo ' <div class="list">
                                    <div class="playbox"></div>
                <iframe class="list-video" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" class="list-video" frameborder="0"></iframe> 
            </div>'; 
        } 
    } 
};
?>