     <!---   <footer>
            Desenvolvido por equipe de T.I &copy; <?= date('Y') ?> - Versão 1.0
        </footer>
        --->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.js"></script>
        <script>
            $(document).ready(function() {
                <?php
                if (isset($_SESSION['msg'])):
                ?>
                    new jBox('Notice', {
                        content: '<?php echo $_SESSION['msg']; ?>',
                        color: '<?php echo $_SESSION['msg_color']; ?>',
                        animation: 'pulse',
                        showCountdown: true,
                        position:{
                            x: 'right',
                            y: 'top'
                        }
                    });
                    <?php
                    unset($_SESSION['msg']);
                    unset($_SESSION['msg_color']);
                endif;
                ?>
            });

            new jBox('Confirm', {
            confirmButton: 'Sim!',
            cancelButton: 'Não'
            });
            
        </script>

</body>
</html>
