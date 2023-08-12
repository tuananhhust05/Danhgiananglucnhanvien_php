<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<?= file_get_contents('https://timviec365.vn/includes/home/footer_new.php', true) ?>
</div>
<div id="add_jslivechat"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.min.js" integrity="sha512-eVL5Lb9al9FzgR63gDs1MxcDS2wFu3loYAgjIH0+Hg38tCS8Ag62dwKyH+wzDb+QauDpEZjXbMn11blw8cbTJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var socket;
</script>
<script src="/js/livechat/app.js?v=1"></script>
<div class="loading" style="display:none">
    <div class="loading_gif">
        <img src="https://timviec365.vn/images/loading_ajax.gif" alt="Đang tải">
    </div>
</div>
<script>
    $(".open_content").on('click', function() {
        let content = $(this).parent().find('.content_show');
        if (content.is(':hidden')) {
            content.css('display', 'block');
            $(this).find('.arr_respon img').css('transform', 'rotate(180deg)')
        } else {
            content.removeAttr('style');
            $(this).find('.arr_respon img').css('transform', 'rotate(0deg)')
        }
    })
</script>