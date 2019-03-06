
{* our plugin namespace *}
{namespace name="frontend/ost-lottery/index/fields/text"}





<div class="field--checkbox">

<div class="label--container">

    {$field.name}:
</div>


<div class="element--container">

    {assign var="values" value=";"|explode:$field.values}


    {foreach $values as $i => $value}

        <label for="{$id}--{$i}">{$value}</label>
        <input type="checkbox" name="{$id}[]" id="{$id}--{$i}" value="{$value}">



    {/foreach}






</div>

</div>


