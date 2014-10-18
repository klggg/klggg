

<script>
function JqueryAjaxs(q,action){
var api = $.dialog({id:'L360'});

$.ajax({

    url:'/?user&q='+q+action,
    success:function(data){
        api.content(data);

    }

});

}
</script>

</div>
<? $this->magic_include(array('file' => "footer.html", 'vars' => array('template_dir' => 'themes/rongzi')));?>
		