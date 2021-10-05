<script src="{{ asset('public/backend') }}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{ asset('public/backend') }}/js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{ asset('public/backend') }}/js/jquery.scrollTo.min.js"></script>
<script src="{{ asset('public/backend') }}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{ asset('public/backend') }}/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{ asset('public/backend') }}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{ asset('public/backend') }}/js/owl.carousel.js" ></script>
<script src="{{ asset('public/backend') }}/js/jquery.customSelect.min.js" ></script>
<script type="text/javascript" language="javascript" src="{{ asset('public/backend') }}/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/assets/data-tables/DT_bootstrap.js"></script>
<script src="{{ asset('public/backend') }}/js/respond.min.js" ></script>
<script type="text/javascript" src="{{ asset('public/backend') }}/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<!--pickers script-->
<script type="text/javascript" src="{{ asset('public/backend') }}/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('public/backend') }}/js/pickers/init-date-picker.js"></script>

<!--right slidebar-->
<script src="{{ asset('public/backend') }}/js/slidebars.min.js"></script>

<!--dynamic table initialization -->
<script src="{{ asset('public/backend') }}/js/dynamic_table_init.js"></script>

<!--common script for all pages-->
<script src="{{ asset('public/backend') }}/js/common-scripts.js"></script>

<!--script for this page-->
<script src="{{ asset('public/backend') }}/js/sparkline-chart.js"></script>
<script src="{{ asset('public/backend') }}/js/easy-pie-chart.js"></script>

<!--select2-->
<script type="text/javascript" src="{{ asset('public/backend') }}/assets/select2/select2.min.js"></script>

<!--select2-->
<script>
    jQuery(document).ready(function() {
        // Select2
        jQuery(".select2").select2({
            width: '100%'
        });
    });
</script>

<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- delete -->
<script type="text/javascript">
    $(document).on("click", "#delete", function(e){
     e.preventDefault();
     var link = $(this).attr("href");
        swal({
          title: "Are you sure?",
          text: "Delete this data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
               window.location.href = link;
          } else {
            swal("Safe Data!");
          }
        });
    });
</script>

<!-- approveBtn -->
<script>  
 $(document).on("click", "#approveBtn", function(e){
     e.preventDefault();
     var link = $(this).attr("href");
        swal({
          title: "Approved this data!",
          text: "Are you sure?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
               window.location.href = link;
          } else {
            swal("Safe Data!");
          }
        });
    });
</script>

<!-- preloader -->
<script type="text/javascript">
    $(function () {
        setTimeout(function(){
            jQuery('#loading').fadeOut("slow");
        });
    });
</script>

<!--summernote-->
<script src="{{ asset('public/backend') }}/assets/summernote/summernote-bs4.min.js"></script>

<script>
  $('.summernote').summernote({
    height: 100,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true,
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
    ],
    placeholder: "Write Description Here...",
    callbacks: {
        onInit: function () {
            var editor = elem.next(),
                placeholder = editor.find(".note-placeholder");

            function isEditorEmpty() {
                var code = elem.summernote("code");
                return code === "<p><br></p>" || code === "";
            }

            editor.on("focusin focusout", ".note-editable", function (e) {
                if (isEditorEmpty()) {
                    placeholder[e.type === "focusout" ? "show" : "hide"]();
                }
            });
        }
    }
  });
</script>

<!--form validation-->
<script type="text/javascript" src="{{ asset('public/backend') }}/js/jquery.validate.min.js"></script>

<!-- Toastr JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

  
    switch(type){
          case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>

<!-- Handlebars -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>