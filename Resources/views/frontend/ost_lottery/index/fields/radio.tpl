
{* our plugin namespace *}
{namespace name="frontend/ost-lottery/index/fields/text"}



<div class="field--radio">
    <div class="label--container">
        {$field.name}:
    </div>
    <div class="element--container">
        {assign var="values" value=";"|explode:$field.values}
        {foreach $values as $i => $value}
            <div class="radio-element">
                <input type="radio" name="{$id}" id="{$id}--{$i}" value="{$value}">
                <label for="{$id}--{$i}">{$value}</label>
            </div>
        {/foreach}
    </div>
</div>
