<?php

namespace Project\App\Services;

/**
 * Service
 */
class Service
{    
    /**
     * generateSignature
     *
     * @param  array $data
     * @param  array<string> $colors
     * @return void
     */
    public function generateSignature(array $data, array $colors = []): array
    {
        $signatures = [];
        foreach ($colors as $color) {
            $signatures[$color] = $this->generateHTML($data, $color);
        }

        return $signatures;
    }
    
    /**
     * generateHTML
     *
     * @param  array<string> $data
     * @param  string $color
     * @return string
     */
    private function generateHTML(array $data, string $color = null): string
    {
        $phone = $data['phone'];
        $email = $data['email'];

        $userData = [
            ...$data,
            'phone' => $this->stylePhoneNumber($phone),
            'email' => $this->clickableEmail($email),
        ];
        $string = '<hr><table style="color: ' . $color . '"><tr><td>С уважением,</td></tr>';
        foreach ($userData as $value) {
            $string .= "
            <tr>
                <td>$value</td>
            </tr>
            ";
        }
        $string .= '</table>';
        
        return $string;
    }
    
    /**
     * stylePhoneNumber
     *
     * @param  string $phoneNumber
     * @return string
     */
    private function stylePhoneNumber(string $phoneNumber): string
    {
        $number = preg_replace('/[^0-9]/', '', $phoneNumber);
        $countryCode = substr($number, 0, 3);
        $operatorCode = ' (' . substr($number, 3, 2) . ') ';
        $personalNumber1 = substr($number, 5, 3);
        $personalNumber2 = substr($number, 8, 2);
        $personalNumber3 = substr($number, 10, 2);
        $fullPersonalNumber = implode('-', [$personalNumber1, $personalNumber2, $personalNumber3]);
        return '<span>phone:<a href="tel:' . $number . '">+' . $countryCode . $operatorCode . $fullPersonalNumber . '</a></span>';
    }

    private function clickableEmail(string $email): string
    {
        return '<span>email:<a href= "mailto:' . $email . '">' . $email . '</a></span>';
    }
}