<div class="lunch_form">
    <div class="div_lunch_title">
        <input placeholder="Title (e.g. Gozen)" class="form_column_medium" name="title" type="text">
        <input placeholder="Sub Title" class="form_column_medium" name="subtitle" type="text">
    </div>

    <div class="combo_fields_wrap">
        <div class='div_column_medium'>
            <input placeholder="Combination title (e.g. Served with miso soup)" class="" name="combo_title" type="text">
            <textarea row="1" placeholder="Combination Description" class="form_column_long" name="combo_desc"></textarea>
        </div>
    </div>
    <!-- <button id="add_more_addons" class="new_section">&#43;
        <span class="new_section_text">Add more add-on item</span>
    </button> -->

    <div class="item_fields_wrap">
        <div>
            <div class="div_column_medium">
                <input placeholder="Item (e.g. Sushi combo)" class="form_column_medium" name="item_name[]" type="text">
                <input placeholder="Price" class="form_column_medium" name="item_price[]" type="text">    
            </div>
            <div class="div_choice">
                <div class="div_label_checkbox">
                    <label for="is_raw">This is raw</label>
                    <input name="is_raw[0]" value="N" type="hidden">
                    <input class="is_raw_checkbox" name="is_raw[0]" value="Y" type="checkbox">
                </div>
            </div>
            <button id="show_description_box" class="new_section">&#43;
                <span class="new_section_text">Add description</span>
            </button>
            <textarea rows="1" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="item_description[]"></textarea>
            <button type="button" name="remove_description" class="remove_description_field">&times;</button>
        </div>
    </div>
    <button id="add_more_items" class="new_section">&#43;
        <span class="new_section_text">Add more item</span>
    </button>
    <input value="Add" type="submit">
</div>

