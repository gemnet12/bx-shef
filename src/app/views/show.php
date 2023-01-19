<?php 
/**
 * @var array<string> $signature
 */
?>

<h1>Here are your signatures</h1>
<?php foreach ($signatures as $signature) : ?>
    <?= $signature ?>
    <div>
        <strong>Copy</strong>
    </div>
    <textarea class="copyboard" cols="30" rows="10">
        <?= $signature ?>
    </textarea>
    <hr>
<?php endforeach; ?>
<a href="/">Back</a>
<script>
    const clipboards = document.querySelectorAll('.copyboard');
    clipboards.forEach((board) => {
        board.addEventListener('click', (e) => {
            const board = e.target;
            board.select();
            board.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(board.value);
        })
    })
</script>