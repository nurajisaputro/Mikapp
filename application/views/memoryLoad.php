<style>
    P {
        padding: 0;
        margin: 0;
    }

    .text {
        font-size: 15px;
    }
</style>

<p class="text">
    <?php 
    echo FormatBytes($memory); 
    // echo $memory; 
    ?>
</p>