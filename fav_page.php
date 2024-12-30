<div class="favourite">
<h3>Избранные задачи:</h3>
<? foreach($fav as $fav_item): ?>
    <ul>
    <? echo $fav_item['id']; ?> : <?=$fav_item['title']; ?> - <?=$fav_item['content']; ?>
    </ul>
    <? endforeach; ?>
</div>