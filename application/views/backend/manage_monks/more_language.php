<div class="row parent-row">
  <div class="col-xs-12 col-sm-9 col-md-3">
    <div class="form-group">
      <label for="language" class="control-label"><strong>ភាសា:</strong></label>
      <div class="input-group col-sm-8">
        <select name="language[]" id="language" class="form-control chosen-select" data-placeholder="ភាសា...">
          <option value="">ភាសា....</option>
          <?php
            foreach ($langauges->result() as $lang_value) {
              echo "<option value='".$lang_value->id."'>".$lang_value->name."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-2 offset2">
    <div class="form-group">
      <label for="read" class="control-label"><strong>អាន:</strong></label>
      <div class="input-group col-sm-12">
        <select name="read[]" id="read" class="form-control chosen-select" data-placeholder="អាន...">
          <option value="">អាន....</option>
          <?php
            foreach (lavel_language() as $key_read => $value_read) {
              echo "<option value='".$key_read."'>".$value_read."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-2">
    <div class="form-group">
      <label for="writing" class="control-label"><strong>សរសេរ:</strong></label>
      <div class="input-group col-sm-12">
        <select name="writing[]" id="writing" class="form-control chosen-select" data-placeholder="សរសេរ...">
          <option value="">សរសេរ....</option>
          <?php
            foreach (lavel_language() as $key_writing => $value_writing) {
              echo "<option value='".$key_writing."'>".$value_writing."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-2">
    <div class="form-group">
      <label for="listening" class="control-label"><strong>ស្តាប់:</strong></label>
      <div class="input-group col-sm-12">
        <select name="listening[]" id="listening" class="form-control chosen-select" data-placeholder="ស្តាប់...">
          <option value="">ស្តាប់....</option>
          <?php
            foreach (lavel_language() as $key_listening => $value_listening) {
              echo "<option value='".$key_listening."'>".$value_listening."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-2">
    <div class="form-group">
      <label for="speaking" class="control-label"><strong>និយាយ:</strong><a href="javascript:void(0)" class="btn btn-danger btn-xs pull-right remove_lang" title="Remove" data-monk="" data-lang="" style="margin-left: 94px;margin-top: -8px;"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></label>
      <div class="input-group col-sm-12">
        <select name="speaking[]" id="speaking" class="form-control chosen-select" data-placeholder="និយាយ...">
          <option value="">និយាយ....</option>
          <?php
            foreach (lavel_language() as $key_speaking => $value_speaking) {
              echo "<option value='".$key_speaking."'>".$value_speaking."</option>";
            }
          ?>
        </select>
      </div>
    </div>
  </div>
</div>
