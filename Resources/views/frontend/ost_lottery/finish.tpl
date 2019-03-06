
{* file to extend *}
{extends file="parent:frontend/index/index.tpl"}

{* our plugin namespace *}
{namespace name="frontend/ost-lottery/finish"}



{* add our plugin to the breadcrumb *}
{block name='frontend_index_start'}

    {* smarty parent *}
    {$smarty.block.parent}

    {* our breadcrumb name *}
    {assign var="breadcrumbName" value="Gewinnspiel"}

    {* add it *}
    {$sBreadcrumb[] = ['name' => $breadcrumbName, 'link'=> ""]}

{/block}



{* remove left sidebar *}
{block name='frontend_index_content_left'}{/block}



{* main content *}
{block name='frontend_index_content'}

    {* inner content container *}
    <div class="content ost-lottery--content">

        <div class="finish--container panel">
            <h2 class="panel--title is--underline">Viel Glück!</h2>
            <div class="panel--body is--wide">
                <p>
                    {$ostLottery.finishContent}
                </p>
            </div>
        </div>

    </div>

{/block}
