<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins.js') }}"></script>

<!-- tinymce | TEXT EDITOR -->
<script src="{{ asset('backend/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('/backend/js/tinymce.js') }}"></script>
<!--END tinymce TEXT EDITOR-->


@yield('script')
@yield('script-bottom')
