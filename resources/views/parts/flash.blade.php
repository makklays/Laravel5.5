
<div style="">
    <?php if (Session::has('flash_message')): ?>
        <div class="alert alert-{{ Session::get('flash_type') }}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
            {{ Session::get('flash_message') }}
        </div>
    <?php endif; ?>
</div>