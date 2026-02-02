<?php

namespace App\Services;

class PhoneHelper
{
    /**
     * Normalize Indonesian phone numbers to international format with +62.
     * - '081234...' => '+6281234...'
     * - '6281234...' => '+6281234...'
     * - '+6281234...' => '+6281234...'
     * - Keeps other international numbers starting with '+' unchanged (but removes spaces/non-digit).
     */
    public static function normalizeIndoPhone(?string $raw): ?string
    {
        if ($raw === null) return null;
        $s = trim($raw);
        if ($s === '') return null;

        // remove spaces, dots, parentheses, dashes
        $s = preg_replace('/[^+0-9]/', '', $s);
        if ($s === null) return null;

        // if starts with +, leave as is (but ensure no leading ++)
        if (strpos($s, '+') === 0) {
            // normalize leading + and digits only
            $s = '+' . ltrim($s, '+');
            return $s;
        }

        // starts with 0 -> replace leading 0 with +62
        if (strpos($s, '0') === 0) {
            return '+62' . substr($s, 1);
        }

        // starts with 62 -> add +
        if (strpos($s, '62') === 0) {
            return '+'.$s;
        }

        // otherwise return as-is (digits only)
        return $s;
    }
}
