<!--ADD COMMENT-->
<!-- Modal -->
<div class="modal fade" id="add-comment" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-inverse">
            <div class="modal-header" id="new-comment">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="close-time">×</span></button>
                <h4 class="modal-title">
                    <small>Add new comment</small>
                </h4>
            </div>
            <div class="modal-body">
                <?php $attributes = array('class' => 'form-signin', 'id' => 'add-comment-form', 'autocomplete' => 'on'); ?>
                <?php echo form_open('#', $attributes); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label class="label-modal" for="name-comment">User name</label>
                        <div class="form-group">
                            <input type="text" name="name-comment" id="name-comment" class="form-control" placeholder="Choose name">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <input type="file" name="userfile-comment" id="userfile-comment"/>
                    <input type="hidden" value="<?php print($user->id); ?>" name="user_id" id="user-id-comment">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label class="label-modal" for="text-comment">Message</label>
                        <div class="">
                            <textarea rows="6" id="text-comment" name="text-comment"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-brilliant pull-right btn-xs" id="add-comment-btn">Comment</button>
            </div>
        </div>
    </div>
</div> <!-- #/myModal -->
<!--END COMMENT-->