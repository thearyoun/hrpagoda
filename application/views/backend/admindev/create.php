<label for="">
    <a href="<?php echo base_url().'admindev'?>" class="btn btn-primary btn-sm">
        <i class="fa fa-backward"></i> ត្រលប់ក្រោយ
    </a>
</label>
<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <form method="post" action="<?php echo base_url(); ?>admindev/publish_new_event">

                <div class="form-group">
                    <label for="title" class="control-label">Title:</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="summernote" class="control-label">Body:</label>
                    <textarea name="body" id="summernote" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
