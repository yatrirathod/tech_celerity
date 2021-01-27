
<div id="add-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100 font-weight-bold">Product form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<form id="addProduct" name="addProduct" method="POST">
              	<div class="modal-body">
              	{{ csrf_field() }}				
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="text" name="price" id="price" class="form-control">
					</div>
					<div class="form-group">
	                    <label>Category</label>
	                    <select class="form-control" id="category" name="category">
	                    <option disabled selected value="">Select Category's</option>
	                    @foreach($categoryData ?? '' as $prdcat)
	                        <option value="{{$prdcat->id}}">{{$prdcat->name}}</option>
	                    @endforeach
	                    </select>
	                </div>
					<div class="form-group">
						<label for="image"></label>
			            <img id="preview_img" src="{{ asset('public/images/profile-picture-circle.png') }}" class="" width="200" height="150"  />
			            <br> <br>
			          <input type="file" name="image" id="image" onchange="loadPreview(this);" class="form-control">
					</div>						
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" id="add_submit">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>