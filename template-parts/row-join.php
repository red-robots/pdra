<?php if(get_field("row_join_text","option")):?>
    <div class="column-1"><?php echo get_field("row_join_text","option");?></div><!--.column-1-->
<?php endif;//if for row_2_text?>
<?php if(get_field("row_join_button_text","option")):?>
    <div class="column-2">
        <div class="button">
            <?php echo get_field("row_join_button_text","option");?>
            <?php if(get_field("row_join_button_link","option")):?>
                <a href="<?php echo get_field("row_join_button_link","option");?>" class="surrounding"></a>
            <?php endif;?>
        </div>
    </div><!--.column-2-->
<?php endif;//if for row_2_button_text?>
