<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<p><?php esc_html_e( 'We have finished processing your order.', 'woocommerce' ); ?></p>
<p>
<div style="    color: rgb(80, 80, 80);
font-family: sans-serif;
font-size: 17px;
line-height: 150%;
text-align: left;">Thank you for your recent purchase from BMS Technologies LTD. <br><div style="color: rgb(80, 80, 80); font-family: &quot;Times New Roman&quot;, serif, EmojiFont; font-size: 14px; line-height: 150%; text-align: left; width: 100%; margin-top: 2em;" class="x_stars"><h3 style="color:#202020; display:block; font-family:Arial; font-size:26px; font-weight:bold; line-height:100%; margin-top:0; margin-right:0; margin-bottom:10px; margin-left:0; text-align:left"><a style="color:#0c59f2; font-weight:normal; line-height:1em; text-decoration:underline; font-size:18px" class="x_tp-link" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX39e0g0jiYORvOy95DXO8yx0-3Dfzvj_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HedMBlBvkXvo86KD4evkZ-2FDGdpUkzk0G3zFFob7ZoewM-2FZw7xUwHg3Hjg71rPY7LaSsXLUgq6qMGeTPxqWa-2FIK2HTuInS-2BFUCABww56ubYopkybNC0D4NbEwRyeQoPlbxw-3D-3D" data-linkindex="0">Click here to Review us on Trustpilot </a></h3>
	<table style="margin:.25em 0" class="x_star-rating__table x_8a879ca805e8478a98f5335190be528b">
    <tbody>
        <tr>
            <td style="border-collapse:collapse; width:30px; min-width:20px; padding-right:0.1em; color:inherit; font-size:14px" width="30" class="x_star-rating__table__radio-btn"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZN84vLyGFt3G7c7Po0G6QwD-2BBpTfkRq8kCbzyTpW9FXR5EADnmByaiW1-2F4PzSEYx3fi-2B6YtkroknKyYBxy12cSxFRM_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HVzWbhDRIDH-2FxK-2FpLkzxEd3Ph7cw55MYr3UnAPUD35NOTxtLKzI5SiNJ-2FJ-2Fe8Az-2BZPjRAWdCKayDCnhYAFYHvw6vqBlgyiv-2BAZzHqxv-2F7AF3ee-2BI6HO6zRD53zOS9XOQ6A-3D-3D"
                data-linkindex="1"><span style="font-size:32px; color:#ccc; vertical-align:middle; line-height:36px" class="x_radio-btn">○</span> </a></td>
            <td style="border-collapse:collapse; width:200px; max-width:200px; height:auto; max-height:36px; color:inherit; font-size:14px"
            width="200" class="x_star-rating__table__rating-img">
                <a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZN84vLyGFt3G7c7Po0G6QwD-2BBpTfkRq8kCbzyTpW9FXR5EADnmByaiW1-2F4PzSEYx3fi-2B6YtkroknKyYBxy12cSWdK__3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HVNiQSMj8IAifSd78lROmufBznuq-2BxdVCRLALLvapF28MX-2BohkUfsqJR5-2B2W2kjyGiRzzeW2HjHSXidvTej8L78LL-2Fz5Ax364NPF0QCpR-2FTG2hGJBILA3Ta2W0JHuWuwEA-3D-3D"
                data-linkindex="2"><img style="border:0; line-height:100%; outline:none; text-decoration:none; display:inline; width:100%; vertical-align:middle; height:auto!important" width="200" class="x_star-rating__img" src="https://images-static.trustpilot.com/a-b-tst/review-invitation-assets/tp-new-5-stars.png"
                    data-imagetype="External"> </a>
            </td>
            <td style="border-collapse:collapse; padding-left:.5em; text-align:left; min-width:70px; color:inherit; font-size:14px" align="left" class="x_star-rating__table__rating-word"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZN84vLyGFt3G7c7Po0G6QwD-2BBpTfkRq8kCbzyTpW9FXR5EADnmByaiW1-2F4PzSEYx3fi-2B6YtkroknKyYBxy12cS_Rp3_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HdBMbCmW6ZJeT9Dph2Y-2Fld9KBf3v0Ea3T0NU9alG3Q-2BvX76fyUR3M03tpzJO8tiL1bpPwKXUb5I0UWv8ae4lV-2Bbs6kFWTptkzjY-2B-2F7DdkOKAsS3neEflXrj8Qc79OtpcvQ-3D-3D"
                data-linkindex="3"><span style="display:inline-block; line-height:36px; vertical-align:middle; height:36px" class="x_rating-word"></span><br></a></td>
        </tr>
    </tbody>
</table>
<table style="margin:.25em 0" class="x_star-rating__table">
    <tbody>
        <tr>
            <td style="border-collapse:collapse; width:30px; min-width:20px; padding-right:0.1em; color:inherit; font-size:14px" width="30" class="x_star-rating__table__radio-btn"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYC68wl3m2AUKel6xQvHaEW0FY1EOn-2BCEBkHPQyy2OFfQyGlmJBCGonghmgGAien7j1c9avy8nOc965Gdj-2B1sggFM1K_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HYs6jcR8AOa3zT6fALd2Ksw4EFMnD8awtTS-2Bw2dKX7OXR5mQniy0M3uC4PflbvQF2BDSRm9CU4gWzBxOwWXcI1IRg8IlE5s2XErkxidc-2FyG8-2FVstRcNbo0TYvDhdxBBmOg-3D-3D"
                data-linkindex="4"><span style="font-size:32px; color:#ccc; vertical-align:middle; line-height:36px" class="x_radio-btn">○</span> </a></td>
            <td style="border-collapse:collapse; width:200px; max-width:200px; height:auto; max-height:36px; color:inherit; font-size:14px"
            width="200" class="x_star-rating__table__rating-img">
                <a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYC68wl3m2AUKel6xQvHaEW0FY1EOn-2BCEBkHPQyy2OFfQyGlmJBCGonghmgGAien7j1c9avy8nOc965Gdj-2B1sgg52ZH_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HR3dn1v4mQaqvdrrSfbdNns0lHvfcYCP9C5C-2Be38ME7XXrfqdtfikonA-2B7Ex5kfNvGUMrHaZR80gRn9pDYDHuJ0sv0UA9Tt7XuobyD5FqL-2BcNT5i-2FYopI2EWBXulWbaMSA-3D-3D"
                data-linkindex="5"><img style="border:0; line-height:100%; outline:none; text-decoration:none; display:inline; width:100%; vertical-align:middle; height:auto!important" width="200" class="x_star-rating__img" src="https://images-static.trustpilot.com/a-b-tst/review-invitation-assets/tp-new-4-stars.png"
                    data-imagetype="External"> </a>
            </td>
            <td style="border-collapse:collapse; padding-left:.5em; text-align:left; min-width:70px; color:inherit; font-size:14px" align="left" class="x_star-rating__table__rating-word"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYC68wl3m2AUKel6xQvHaEW0FY1EOn-2BCEBkHPQyy2OFfQyGlmJBCGonghmgGAien7j1c9avy8nOc965Gdj-2B1sggRngq_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HUm667-2FQc-2BqrVYg37NVLaV6UgFC8a3uy5HypOr0jj38aEMVWwFuKPshAi0eTcbIMSwfWaHOmoA-2FFy0M10H8YQ9dLEkdFC1a-2FmitlJdFKlno6lkFz7fFRH2J1t0uefmGuVA-3D-3D"
                data-linkindex="6"><span style="display:inline-block; line-height:36px; vertical-align:middle; height:36px" class="x_rating-word"></span><br></a></td>
        </tr>
    </tbody>
</table>
<table style="margin:.25em 0" class="x_star-rating__table">
    <tbody>
        <tr>
            <td style="border-collapse:collapse; width:30px; min-width:20px; padding-right:0.1em; color:inherit; font-size:14px" width="30" class="x_star-rating__table__radio-btn"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZqpCIqT5M0im-2BWWCTAMjxw4sCzH2WnO511mKFZiFGIhpnJYD7cC6LDyi4YucG5qVqRTugBFde-2FFxVDEhDjMSc1CkbJ_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HY4O9Y1aks0KbhzPY71IQwFJzVPYJphrJYYXftAtLM92ge4UYHNR7yH9DJVwnw5GUWIySbJauSRKoBdBuSGmPJ6enQdMgEE2H3z9h2axK3PIq-2BJdlBRjnONnl0cVzqk36g-3D-3D"
                data-linkindex="7"><span style="font-size:32px; color:#ccc; vertical-align:middle; line-height:36px" class="x_radio-btn">○</span> </a></td>
            <td style="border-collapse:collapse; width:200px; max-width:200px; height:auto; max-height:36px; color:inherit; font-size:14px"
            width="200" class="x_star-rating__table__rating-img">
                <a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZqpCIqT5M0im-2BWWCTAMjxw4sCzH2WnO511mKFZiFGIhpnJYD7cC6LDyi4YucG5qVqRTugBFde-2FFxVDEhDjMSc1VrB7_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HQGcsQWBR0AmtAayZNDjbNZkm5-2BpT4ZVfxhc294SuPlpwBPRVaJ9bcN2cz-2Felf3PTK0AsLofw1dk2SoIwkqrxJfqVsQx0AkLnOw-2FeMk031dJZdlnX-2BFfqpFlIcvN0JGV-2BQ-3D-3D"
                data-linkindex="8"><img style="border:0; line-height:100%; outline:none; text-decoration:none; display:inline; width:100%; vertical-align:middle; height:auto!important" width="200" class="x_star-rating__img" src="https://images-static.trustpilot.com/a-b-tst/review-invitation-assets/tp-new-3-stars.png"
                    data-imagetype="External"> </a>
            </td>
            <td style="border-collapse:collapse; padding-left:.5em; text-align:left; min-width:70px; color:inherit; font-size:14px" align="left" class="x_star-rating__table__rating-word"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZqpCIqT5M0im-2BWWCTAMjxw4sCzH2WnO511mKFZiFGIhpnJYD7cC6LDyi4YucG5qVqRTugBFde-2FFxVDEhDjMSc1fsNa_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HftFlzWU7vEUTgvJWq3pvn0Xcvf4EB9KnPv72IZ5MZz6tLexB6Kw7Ihz1-2F3DqcnQk3QJpZMIusjMmmStPDrWjBFakTxnWRUaNcCT1U4e8fiaIbDBWPyFLKVQ5GQOW-2FCZdA-3D-3D"
                data-linkindex="9"><span style="display:inline-block; line-height:36px; vertical-align:middle; height:36px" class="x_rating-word"></span><br></a></td>
        </tr>
    </tbody>
</table>
<table style="margin:.25em 0" class="x_star-rating__table">
    <tbody>
        <tr>
            <td style="border-collapse:collapse; width:30px; min-width:20px; padding-right:0.1em; color:inherit; font-size:14px" width="30" class="x_star-rating__table__radio-btn"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYfRDBy-2B7IZGvR6mj7qfR-2BX3A99q-2BT-2BqDhembL3n8Q3Eehs-2BcyP93O5lKGanmq2cq386BBkfFP-2F5aRFqeKz-2BZG-2BzAF9_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HZmIi5WstLc0mMbZQG4xwKPGMdgilamssKIX5ltWs4kdZEzS2nOOR3uT-2BgOKTl3qom2P3MGhHc-2BFge9qSD2FxV2NWW92Td8ohKrGam3T6YqjeJsKhxXdF-2BhGHKHXhN4POQ-3D-3D"
                data-linkindex="10"><span style="font-size:32px; color:#ccc; vertical-align:middle; line-height:36px" class="x_radio-btn">○</span> </a></td>
            <td style="border-collapse:collapse; width:200px; max-width:200px; height:auto; max-height:36px; color:inherit; font-size:14px"
            width="200" class="x_star-rating__table__rating-img">
                <a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYfRDBy-2B7IZGvR6mj7qfR-2BX3A99q-2BT-2BqDhembL3n8Q3Eehs-2BcyP93O5lKGanmq2cq386BBkfFP-2F5aRFqeKz-2BZG-2BPE5D_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HZjpPqNs39NmVQtC-2FyZ26idBg1NmPTixekaRmw09rFy15qtJUn9Cz-2FFwwIv-2Fscag1ljOkEs0u3-2F68CfqqDwwFllAfSld5b6spMCnMsjgjYP0j3dVoZ3ugeKuXQO7gofnLA-3D-3D"
                data-linkindex="11"><img style="border:0; line-height:100%; outline:none; text-decoration:none; display:inline; width:100%; vertical-align:middle; height:auto!important" width="200" class="x_star-rating__img" src="https://images-static.trustpilot.com/a-b-tst/review-invitation-assets/tp-new-2-stars.png"
                    data-imagetype="External"> </a>
            </td>
            <td style="border-collapse:collapse; padding-left:.5em; text-align:left; min-width:70px; color:inherit; font-size:14px" align="left" class="x_star-rating__table__rating-word"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeYfRDBy-2B7IZGvR6mj7qfR-2BX3A99q-2BT-2BqDhembL3n8Q3Eehs-2BcyP93O5lKGanmq2cq386BBkfFP-2F5aRFqeKz-2BZG-2BtXxl_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HTDZGZewuCUHVHhK-2B4PZsR4DSIdgeCGr3o8wx7SvfOL1sG-2BZ7WjEHqn7fIQddIJ5PKiP5T38YuupZhI79dAh-2FxH-2BqTVY2Cv0vc-2BKoA4wTGwYZ1uIUjQt-2BP9NHJ6O04i-2BOA-3D-3D"
                data-linkindex="12"><span style="display:inline-block; line-height:36px; vertical-align:middle; height:36px" class="x_rating-word"></span><br></a></td>
        </tr>
    </tbody>
</table>
<table style="margin:.25em 0" class="x_star-rating__table">
    <tbody>
        <tr>
            <td style="border-collapse:collapse; width:30px; min-width:20px; padding-right:0.1em; color:inherit; font-size:14px" width="30" class="x_star-rating__table__radio-btn"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZJcvqyM1GdiNw5AhaYgrZ6ZJoXIxBclkj5t8dg386wQeIrRlFbTTqW8-2BiVlfJf1dE-2B8AwIwaiXluE7mr-2FUIi6kVE8d_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HWKWJ7o-2F4oTT7nIYdxT6d4wu3rJ9X36UJWYEPNvs0BlBOt5qxLxWBEl4-2F-2FbmJL5ceOSoSbmz2FbFbkG4npJYK4Nk5Hmdz4yuYwmKfUr8uvtpz6NjxBesGsTo3nAgqkN1Hw-3D-3D"
                data-linkindex="13"><span style="font-size:32px; color:#ccc; vertical-align:middle; line-height:36px" class="x_radio-btn">○</span> </a></td>
            <td style="border-collapse:collapse; width:200px; max-width:200px; height:auto; max-height:36px; color:inherit; font-size:14px"
            width="200" class="x_star-rating__table__rating-img">
                <a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZJcvqyM1GdiNw5AhaYgrZ6ZJoXIxBclkj5t8dg386wQeIrRlFbTTqW8-2BiVlfJf1dE-2B8AwIwaiXluE7mr-2FUIi6khmww_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HVzKXGh-2Bq24-2F7rAgQ9Ubr6ooVO5D-2FdSU81dq4iyHNSHRn9GDu2ZfXzWAAjWeJga3VAnwwrTEsDag2PQH-2FigjOvpa5LzMlkvEzotsUTjtD5LwZPTt4f70eSUTHWdoqvGLCw-3D-3D"
                data-linkindex="14"><img style="border:0; line-height:100%; outline:none; text-decoration:none; display:inline; width:100%; vertical-align:middle; height:auto!important" width="200" class="x_star-rating__img" src="https://images-static.trustpilot.com/a-b-tst/review-invitation-assets/tp-new-1-star.png"
                    data-imagetype="External"> </a>
            </td>
            <td style="border-collapse:collapse; padding-left:.5em; text-align:left; min-width:70px; color:inherit; font-size:14px" align="left" class="x_star-rating__table__rating-word"><a style="color:black; text-decoration:none" class="x_star-rating" data-auth="NotApplicable" rel="noopener noreferrer" target="_blank" href="https://link.trustpilot.com/ls/click?upn=u001.n3nMhxJEmSCQtZM-2FlSM22-2Fr8qKSK846XlPty5oVLDOUAdhs5hVbX32JKA5UpUAEvGu4bT10yOxd5x6SrzoJX353MJxrqWJMhdX844uUToeZJcvqyM1GdiNw5AhaYgrZ6ZJoXIxBclkj5t8dg386wQeIrRlFbTTqW8-2BiVlfJf1dE-2B8AwIwaiXluE7mr-2FUIi6kQVr4_3LPFrEsINDNmzY20V-2BKbwJBlH5ROk5mDwxyWMu61XOU7-2BKK7TYn3Nhjx-2B-2FmDjkK24oa9isv9idgPC32rpXMKK-2Bj5Py7Oy8UrL5L-2FPOuZX-2FgG-2BLMdg8kJDD-2FfbdIy1PAFkztk4HssgPSioDsLpR-2B3CLbFR3LZ-2FtQ6yx1c9rDAprDhf-2BjsTibo9cNXcdqYpC7YtX7QTVZxSzuoqimiKvlHcOhfkZqwMI52v4vV-2F3K6K24XqIrHGdv76sNd-2B-2F4-2FQssQ47fi60vHMqZBQr6OWj7BLrLq-2F2TlJ8mNeuz-2F9WCFy8NOGT-2BHXZkIPoza5DN-2BpIbCqFDBzal-2FhN1tjpx50e-2BIlXDQZ2C0n033fl10Ih3jv02utbfB2Zb-2BrsA6ApB9aWDjTIjEeURVPZvAj4Cwe0f5HV3deiu7qUIuvvqiS-2FGvTpStkgzTBeatpbu6X-2BCcU0M0o32aTWx7HtTgsPnlFpCABNM-2F5XxzpYPvg4isFFrXhrg2WTnuAPhy-2BTQLCBAjNY6bWF0nkP6fr4wGzYYVPkQ-2Bgw-3D-3D"
                data-linkindex="15"><span style="display:inline-block; line-height:36px; vertical-align:middle; height:36px" class="x_rating-word"></span><br></a></td>
        </tr>
    </tbody>
</table>
</div>
<br>Your experience is important to us and your review (whether good, bad, or otherwise) will be posted on Trustpilot.com to help other people make more informed decisions.
<br>
<br><strong>Thanks for your time, <br>BMS Technologies LTD</strong>
<br>
<br><strong>Please note:</strong> This email is sent automatically, so you may have received this review invitation before the arrival of your package or service. In this case, you are welcome to wait with writing your review until your package or service
arrives. &nbsp;
<br>
<br>
</div>
</p>
<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
//do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
//do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
//do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	//echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
//do_action( 'woocommerce_email_footer', $email );
