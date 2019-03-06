
{* our plugin namespace *}
{namespace name="frontend/ost-lottery/index/fields/text"}




<div class="field--radio">

<div class="label--container">

    {$field.name}:
</div>


<div class="element--container">

    {assign var="values" value=";"|explode:$field.values}


    {foreach $values as $i => $value}

        <label for="{$id}--{$i}">{$value}</label>
        <input type="radio" name="{$id}" id="{$id}--{$i}" value="{$value}">



    {/foreach}



</div>

</div>