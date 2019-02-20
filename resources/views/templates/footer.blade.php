        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                let isOpen = false;
                $('#sidebar-toggler').click(function(){
                    sidebarToggle(isOpen);
                });
                $('#sidebar-close').click(function(){
                    sidebarToggle(isOpen);
                })
                $('#authToggler').click(function(){
                    $('#auth-dropdown').toggleClass('hide');
                });

                function sidebarToggle(state){
                    if(state){
                        $('#sidebar').css('transform', 'translateX(-100%)');
                        return isOpen = false;
                    }
                    else {
                        $('#sidebar').css('transform', 'translateX(0)');
                        return isOpen = true;
                    }
                }
            });
        </script>