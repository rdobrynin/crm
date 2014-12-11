<?php include('head_view.php');?>
<!-- Modal -->
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="height: 200px;">
        <p class="lead" style="text-align: center; padding-top: 50px;"><?php print($response);?></p>
      </div>
      <form name="userForm" id="clientForm" action="">
        <input type="hidden" name="result" value="<?php print($result);?>">
        </form>
    </div>
  </div>
</div>
<?php include('footer_view.php');?>
<script>
  $(function () {
    $.ajax({
      type: "post",
      url: "ajax/success",
      cache: false,
      data: $('#clientForm').serialize(),
      success: function(json){
        try{
          var obj = jQuery.parseJSON(json);
          url_path = obj['URL'];
          url_result = obj['RESULT'];
        }catch(e) {
          alert('Exception while request..');
        }
      },
      error: function(){
        alert('Error while request..');
      }
    });
    var delay = 1300; //Your delay in milliseconds
    setTimeout(function(){ window.location = url_path+url_result; }, delay);
  });
</script>