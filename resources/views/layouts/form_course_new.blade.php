<div class="course_form">
    <div class="div_course_title">
        <input placeholder="Title (e.g. Two Course)" class="form_column_medium" name="title" type="text">
        <input placeholder="Price" class="form_column_medium" name="course_price" type="text">
    </div>

    <div class="addon_fields_wrap">
        <div class='div_column_medium'>
            <input placeholder="Add-ons (e.g. Served with miso soup)" class="form_column_medium" name="addon_description[]" type="text">
            <input placeholder="Price" class="form_column_medium" name="addon_price[]" type="text">
        </div>
    </div>
    <button id="add_more_addons" class="new_section">&#43;
        <span class="new_section_text">Add more add-on item</span>
    </button>

    <div class="item_fields_wrap">
        <div>
            <div class="div_choice">
                <div class="div_label_checkbox">
                    <label for="choice">Choice of</label>
                    <input name="choice[0]" value="N" type="hidden">
                    <input class="choice_checkbox" name="choice[0]" value="Y" type="checkbox">
                </div>
            </div>
            <div class="div_column_medium">
                <input placeholder="Item (e.g. Sushi combo)" class="form_column_medium" name="item_name[]" type="text">
                <input placeholder="Price" class="form_column_medium" name="item_price[]" type="text">    
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

