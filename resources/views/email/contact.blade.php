<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        New Contact Enquiry
    </title>

</head>

<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:40px 0;">

        <tr>

            <td align="center">

                <table width="650" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:10px;overflow:hidden;">

                    {{-- HEADER --}}
                    <tr>

                        <td style="background:#111827;padding:30px;text-align:center;">

                            <h1 style="color:#ffffff;margin:0;font-size:28px;">

                                New Contact Enquiry

                            </h1>

                        </td>

                    </tr>

                    {{-- BODY --}}
                    <tr>

                        <td style="padding:40px;">

                            <p style="font-size:16px;color:#333;line-height:1.7;">

                                You have received a new contact enquiry from your website.

                            </p>

                            <table width="100%" cellpadding="12" cellspacing="0"
                                style="margin-top:20px;border-collapse:collapse;">

                                <tr>

                                    <td width="180"
                                        style="background:#f8fafc;font-weight:bold;border:1px solid #e5e7eb;">

                                        Name

                                    </td>

                                    <td style="border:1px solid #e5e7eb;">

                                        {{ $contact->name }}

                                    </td>

                                </tr>

                                <tr>

                                    <td
                                        style="background:#f8fafc;font-weight:bold;border:1px solid #e5e7eb;">

                                        Email

                                    </td>

                                    <td style="border:1px solid #e5e7eb;">

                                        {{ $contact->email }}

                                    </td>

                                </tr>

                                <tr>

                                    <td
                                        style="background:#f8fafc;font-weight:bold;border:1px solid #e5e7eb;">

                                        Phone

                                    </td>

                                    <td style="border:1px solid #e5e7eb;">

                                        {{ $contact->phone ?? 'N/A' }}

                                    </td>

                                </tr>

                                <tr>

                                    <td
                                        style="background:#f8fafc;font-weight:bold;border:1px solid #e5e7eb;">

                                        Message

                                    </td>

                                    <td style="border:1px solid #e5e7eb;line-height:1.8;">

                                        {{ $contact->message }}

                                    </td>

                                </tr>

                            </table>

                        </td>

                    </tr>

                    {{-- FOOTER --}}
                    <tr>

                        <td style="background:#f9fafb;padding:25px;text-align:center;">

                            <p style="margin:0;color:#6b7280;font-size:14px;">

                                © {{ date('Y') }} Your Website. All Rights Reserved.

                            </p>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>

</body>

</html>