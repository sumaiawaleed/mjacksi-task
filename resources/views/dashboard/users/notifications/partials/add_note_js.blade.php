<script>
    function add_note(id,name){
        $("#user_id_input").val(id);
        $("#user_name_lable").text("send notification to: "+name);
        $("#create-model").modal('show');
    }

    function send_all(){
        $("#user_name_lable").text("send notification to: all");
        $("#create-model").modal('show');
    }

</script>