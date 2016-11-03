</div>
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        <a href="api_index.php">Api(Carpooling)</a>
        <a href="api_search.php">Api(Search)</a>
        <a href="img_upload.php">Image Upload</a>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text"></h5>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2016 Copyright | Styrmir Óli Þorsteinsson
    </div>
  </div>
</footer>
<script src="js/materialize.min.js"></script>
<script src="js/sha512.js"></script>
<script src="js/forms.js"></script>
<script src="js/navbar.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('ck_editor', {
      language: 'en',
      skin: 'minimalist'
  });
</script>
<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
<!-- <script>tinymce.init({ selector:'textarea' });</script> -->
<!-- <script>
  tinymce.init({
    selector: "textarea",  // change this value according to your HTML
    toolbar: "image | link | media",
    plugins: "image imagetools link wordcount media",
    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions | link"
  });
</script> -->
<script type="text/javascript">
  $(function() {
    $(".button-collapse").sideNav();
  })
</script>