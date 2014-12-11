<?php include('head_view.php'); ?>
<div class="container">
    <div class="page-content-wrapper">
        <div class="page-content inset">
            <div id="wrapper">
<!--                --><?php //var_dump($avatar); ?>
                <a class="btn" data-toggle="confirmation-inline"  data-animation="true" data-original-title="qwq" title="Delete ?">test</a>
            </div>

        </div>
    </div>
</div>
<?php include('footer_view.php'); ?>
<script>
    $(function () {
        $('[data-toggle="confirmation-inline"]').confirmation(
            {
             placement:'right',
             btnOkClass:'btn-danger btn-xs',
             btnCancelClass:'btn-default btn-xs',
             singleton:true,
                onConfirm: function(){
                   alert('test');
                },
                onCancel: function(){
$('[data-toggle="confirmation-inline"]').confirmation('hide');
                }
            }
        );
    });
</script>