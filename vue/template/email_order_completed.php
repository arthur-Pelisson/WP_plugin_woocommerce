<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px;margin:auto">
        <tbody>
            <tr>
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#111111;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                        <tbody>
                            <tr>
                                <td style="padding:36px 48px;display:block">
                                    <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">
                                        Merci pour votre commande</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
            <tr>
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                            <tr>
                                <td valign="top" style="background-color:#ffffff">

                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:48px 48px 32px">
                                                    <div style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

                                                        <p style="margin:0 0 16px">Bonjour {{ nameShipingFirstName }},</p>
                                                        <p style="margin:0 0 16px">{{ email.body }}
                                                        </p>


                                                        <h2 style="color:#111111;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                            Votre commande n'° {{ order_id }} à bien été completer</h2>

                                                        <div style="margin-bottom:40px">
                                                            <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
                                                                            Pour l'achat de {{ product_name }} </td>

                                                </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
                                                        Votre password pour jouer est: {{ password }} </td>

                                </td>
                                </tr>
                                <tr>
                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
                                        <img src="{{ imgUrl }}" alt="{{ product.name }}">
                                    </td>
                                </tr>
                                </tbody>
                                </table>



                                <table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0">
                                    <tbody>
                                        <tr>
                                            <td valign="top" width="50%" style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
                                                <h2 style="color:#111111;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                </h2>

                                                <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
                                                                                {{ user.firstname }}<br>{{ user.secondename }}<br>{{ user.address }}<br>{{ user.location }} <br>
                                                                                <br><a target="_blank">{{ user.email }}</a>
                                                                            </address>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="margin:0 0 16px"><a href="https://lescitesperdues.com/" target="_blank">merci d'avoir command chez lescitésperdues.com</a>&nbsp;!
                                </p>
                                </div>
                                </div>
                </td>
                </tr>
                </tbody>
                </table>
</body>

</html>