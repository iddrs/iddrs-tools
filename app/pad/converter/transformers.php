<?php

namespace pad\converter\transformer;

function to_int(string $value): int {
    return (int) $value;
}

function trim_str(string $value): string {
    return trim($value);
}

function fmt_rubrica(string $value): string {
    if(mb_strlen($value) !== 15) return '';
    return sprintf('%s.%s.%s%s.%s%s.%s%s.%s%s.%s%s.%s%s%s', ...mb_str_split($value, 1));
}

function is_cpf(string $value): string {
    if(mb_substr($value, 0, 3) === '000') {
        return mb_substr($value, 3);
    }
    
    return '';
}

function is_cnpj(string $value): string {
    $cpf = is_cpf($value);
    if($cpf === '') return $value;
    return '';
}

function fmt_cpf(string $value): string {
    if(mb_strlen($value) !== 11) return '';
    return sprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', ...mb_str_split($value));
}

function fmt_cnpj(string $value): string {
    if(mb_strlen($value) !== 14) return '';
    return sprintf('%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s', ...mb_str_split($value));
}

function fmt_cc(string $value): string {
    $value = mb_str_pad(mb_ltrim($value, '0'), 15, '0');
    return sprintf('%s.%s.%s.%s.%s.%s%s.%s%s.%s%s.%s%s.%s%s', ...mb_str_split($value));
}

function valor_sinal(string $value): float {
    $sinal = $value[mb_strlen($value)-1];
    $inteiro = (int) mb_substr($value, 0, mb_strlen($value)-3);
    $decimal = (string) mb_substr($value, mb_strlen($value)-3, 2);
    return (float) $sinal.$inteiro.'.'.$decimal;
}

function extract_data(string $value): string {
    return date_create_from_format('dmY', $value)->format('Y-m-d');
}
    
function to_upper(string $value): string {
    return mb_strtoupper($value);
}

function valor(string $value): float {
    return (float) round((int) $value / 100, 2);
}

function fmt_nro(string $value): string {
    $value = mb_str_pad(mb_ltrim($value, '0'), 14, '0');
    return sprintf('%s.%s.%s.%s.%s%s.%s.%s.%s%s.%s%s.%s%s', ...mb_str_split($value));
}

function fmt_elemento(string $value): string {
    $value = mb_str_pad(mb_ltrim($value, '0'), 6, '0');
    return sprintf('%s.%s.%s%s.%s%s', ...mb_str_split($value));
}

function valor_extra(string $value): float {
    $sinal = array_last(str_split($value, 1));
    $numero = round((int) mb_substr($value, 0, 13) / 100, 2);
    return (float) "{$sinal}{$numero}";
}

function to_nro(string $value): string {
    if($value[0] === '7') {
        $value[0] = '1';
    }
    elseif($value[0] === '8') {
        $value[0] = '2';
    }
    return $value;
}