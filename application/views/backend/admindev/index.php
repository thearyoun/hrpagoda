<?php if($this->session->userdata("user_type")=="admin"):?>
<label for="">
    <a href="<?php echo base_url().'admindev/create'?>" class="btn btn-primary btn-sm">
       <i class="fa fa-plus"></i> បង្កើតថ្មី
    </a>
</label>
<?php endif;?>
    <div class="col-md-12">
        <?php foreach ($posts->result() as $row) { ?>
            <div class="card">
                <h2><?php echo $row->title; ?></h2>
                <h5>Posted on, <?php echo $row->created_at; ?></h5>
                <div class="fakeimg" style="height:200px;">Image</div>
                <br>
                <?php echo character_limiter($row->body); ?>
                <hr>
                <div class="comment">
                    <?php
                    $comment = get_comment($row->id);
                    if ($comment) {
                        foreach ($comment->result() as $row_com) {
                            ?>
                            <div class="media">
                                <div class="media-left media-middle">
                                    <img src="<?php echo base_url().'ftemplate/images/'.$row_com->photo; ?>" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo ucfirst($row_com->username); ?></h4>
                                    <p><?php echo $row_com->comment; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <form method="post" action="<?php echo base_url(); ?>admindev/publish_comments">
                    <input type="hidden" name="post_id" value="<?php echo $row->id; ?>">
                    <div class="form-group">
                        <label for="comment" class="control-label">Comments:</label>
                        <textarea name="comment" cols="30" rows="5" id="comment" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-success">Submit</button>
                </form>
            </div>
            <hr>
        <?php } ?>
    </div>

<style>
    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Fake image */
    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }
</style>