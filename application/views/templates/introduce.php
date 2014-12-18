<!--Create project modal window-->
<div class="modal show" id="introduce_modal" tabindex="-1" role="dialog" aria-labelledby="introduce_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php $attributes = array('class' => 'form-signin', 'id' => 'introduce_form', 'autocomplete' => 'on'); ?>
        <?php echo form_open('#', $attributes); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    What's is new in Brilliant Task Management
                </h4>
            </div>
            <div class="modal-body" style="padding: 20px;">

<div class="row-fluid">
    <div class="row text-center">

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="http://placehold.it/800x500" alt="">
                <div class="caption">
                    <h4>Time tracker</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="http://placehold.it/800x500" alt="">
                <div class="caption">
                    <h4>Adjust task labels</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="http://placehold.it/800x500" alt="">
                <div class="caption">
                    <h4>Invitation system</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="http://placehold.it/800x500" alt="">
                <div class="caption">
                    <h4>Event system</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

    </div>
</div>

            </div>
            <div class="modal-footer">
                <div class="pull-left" style="padding-top: 10px;"><input id="dont-show-whats-new" type="checkbox" name="dontshow"><label for="dont-show-whats-new" type="checkbox">&nbsp;Dont'show again. You will still be able to access this dialog through the "Settings" Menu in the application header</div>
                <input type="hidden" name="user_introduce_id" id="user_introduce_id" value="<?php print($user[0]['id'])?>">
                <button type="button" class="btn btn-default pull-right" id="close-introduce" style="margin-top:5px;" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php form_close( );?>
    </div>
</div> <!-- #/addproject_moda -->





<script type="text/javascript">
    $(function () {
        $('#close-introduce').click(function () {
           var check = $('#dont-show-whats-new').prop('checked');
            var user = $('#user_introduce_id').val();
            var form_data_ = {
                check: check,
                id: user
            };
            $.ajax({
                url: "<?php echo site_url('ajax/updateIntroduce'); ?>",
                type: 'POST',
                data: form_data_,
                dataType: 'json',
                success: function (msg) {
                    console.log(msg);
           if(msg == true) {
                 $('#introduce_modal').removeClass('show');
                 $('#introduce_modal').modal('hide');
                $('.b-overlay').css('display','none');
             }
                }
            });
        });


        if ( $( "#introduce_modal" ).is( ".show" ) ) {
            $('.b-overlay').css('display','block');

        }
    });
</script>
