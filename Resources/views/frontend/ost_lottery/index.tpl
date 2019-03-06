
{* file to extend *}
{extends file="parent:frontend/index/index.tpl"}

{* our plugin namespace *}
{namespace name="frontend/ost-lottery/index"}



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

    {assign var="lottery" value=$ostLottery}

    {* inner content container *}
    <div class="content ost-lottery--content">

        {* complete form *}
        <form action="" method="post">

            {if $lottery.banner != ""}
                <div class="image--container">
                    <img src="{$lottery.banner}" />
                </div>
            {/if}

            {if count($lottery.fields) > 0}
                <div class="lottery--container panel">
                    <h2 class="title panel--title is--underline">Gewinnspiel</h2>
                    <div class="fieldset panel--body is--wide">
                        {foreach $lottery.fields as $field}
                            {assign var="id" value="ost-lottery--id-{$field.id}"}
                            {include file="frontend/ost_lottery/index/fields/{$field.type}.tpl" field=$field id=$id}
                        {/foreach}
                    </div>
                </div>
            {/if}

            <div class="participant--container panel">
                <h2 class="title panel--title is--underline" >Teilnehmer</h2>
                <div class="participant-form panel--body is--wide">
                    {getSalutations variable="salutations"}
                    <div class="register--salutation field--select select-field">
                        <select name="register[salutation]"
                                id="salutation"
                                required="required"
                                aria-required="true"
                                class="is--required{if isset($error_flags.salutation)} has--error{/if}">
                            <option value=""
                                    disabled="disabled"
                                    {if $form_data.salutation eq ""} selected="selected"{/if}>
                                {s name='RegisterPlaceholderSalutation' namespace="frontend/register/personal_fieldset"}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}
                            </option>
                            {foreach $salutations as $key => $label}
                                <option value="{$key}"{if $form_data.salutation eq $key} selected="selected"{/if}>{$label}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="register--firstname">
                        <input autocomplete="section-personal given-name"
                               name="register[firstname]"
                               type="text"
                               required="required"
                               aria-required="true"
                               placeholder="{s name='RegisterPlaceholderFirstname' namespace="frontend/register/personal_fieldset"}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}"
                               id="firstname"
                               value="{$form_data.firstname|escape}"
                               class="register--field is--required{if isset($error_flags.firstname)} has--error{/if}" />
                    </div>
                    <div class="register--lastname">
                        <input autocomplete="section-personal family-name"
                               name="register[lastname]"
                               type="text"
                               required="required"
                               aria-required="true"
                               placeholder="{s name='RegisterPlaceholderLastname' namespace="frontend/register/personal_fieldset"}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}"
                               id="lastname" value="{$form_data.lastname|escape}"
                               class="register--field is--required{if isset($error_flags.lastname)} has--error{/if}" />
                    </div>
                    <div class="register--street">
                        <input autocomplete="section-billing billing street-address"
                               name="register[street]"
                               type="text"
                               placeholder="{s name='RegisterBillingPlaceholderStreet' namespace="frontend/register/billing_fieldset"}{/s}"
                               id="street"
                               value="{$form_data.street|escape}"
                               class="register--field register--field-street" />
                    </div>
                    <div class="register--zip-city">
                        <input autocomplete="section-billing billing postal-code"
                               name="register[zipcode]"
                               type="text"
                               placeholder="{s name='RegisterBillingPlaceholderZipcode' namespace="frontend/register/billing_fieldset"}{/s}"
                               id="zipcode"
                               value="{$form_data.zipcode|escape}"
                               class="register--field register--spacer register--field-zipcode" />

                        <input autocomplete="section-billing billing address-level2"
                               name="register[city]"
                               type="text"
                               placeholder="{s name='RegisterBillingPlaceholderCity' namespace="frontend/register/billing_fieldset"}{/s}"
                               id="city"
                               value="{$form_data.city|escape}"
                               size="25"
                               class="register--field register--field-city" />
                        <div style="clear: both;"></div>
                    </div>
                    <div class="register--phone">
                        <input autocomplete="section-personal tel"
                               name="register[phone]"
                               type="tel"
                               placeholder="{s name='RegisterPlaceholderPhone' namespace="frontend/register/personal_fieldset"}{/s}"
                               id="phone"
                               value="{$form_data.phone|escape}"
                               class="register--field" />
                    </div>
                    <div class="register--email">
                        <input autocomplete="section-personal email"
                               name="register[email]"
                               type="email"
                               required="required"
                               aria-required="true"
                               placeholder="{s name='RegisterPlaceholderMail' namespace="frontend/register/personal_fieldset"}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}"
                               id="register_personal_email"
                               value="{$form_data.email|escape}"
                               class="register--field email is--required{if isset($error_flags.email)} has--error{/if}" />
                    </div>
                </div>
            </div>

            {if $ostLotteryConfiguration.termsAndConditionsStatus == true}
                <div class="disclaimer--container panel">
                    <h2 class="title panel--title is--underline">Teilnahmebedingungen</h2>
                    <div class="disclaimer panel--body is--wide">
                        <p>
                            {$ostLotteryConfiguration.termsAndConditionsText}
                        </p>
                    </div>
                </div>
            {/if}

            <div class="action--container">
                <button class="btn is--primary">An Gewinnspiel teilnehmen</button>
                <div style="clear: both;"></div>
            </div>

        </form>

    </div>

{/block}
