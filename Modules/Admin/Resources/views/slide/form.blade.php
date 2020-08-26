<form action="" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="row">
       
       <div class="col-sm-12">
          
           <div class="form-group">
               <img  id="out_img" src="{{ asset('images/no_image.jpg') }}" alt="" style="width: 60%;height: 300px">
           </div>
           <div class="form-group">
               <label for="name"> Avatar:</label>
               <input style="width: 60%" type="file" name="avatar" id="input_img" class="form-control">
           </div>
           <div class="form-group">
               
           </div>
       </div>
   </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>

