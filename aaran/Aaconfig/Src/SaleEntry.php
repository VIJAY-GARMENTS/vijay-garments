<?php

namespace Aaran\Aaconfig\Src;

class SaleEntry
{
    public static function enabled(string $feature): bool
    {
        return match (config('aaconfig.app_type')) {
            config('clients.VIJAY_GARMENTS') => in_array($feature, config('vijayGarments.customise', [])),
            config('clients.NEETHU_INDUSTRIES') => in_array($feature, config('neethuIndustries.customise', [])),
            config('clients.SK_PRINTERS') => in_array($feature, config('skPrinters.customise', [])),
        };
    }

    public static function hasOrder(): bool
    {
        return static::enabled(static::order());
    }

    public static function order(): string
    {
        return 'order';
    }

    /**
     * billingAddress
     * @return bool
     */
    public static function hasBillingAddress(): bool
    {
        return static::enabled(static::billingAddress());
    }

    public static function billingAddress(): string
    {
        return 'billingAddress';
    }

    /**
     * deliveryAddress
     * @return bool
     */
    public static function hasShippingAddress(): bool
    {
        return static::enabled(static::shippingAddress());
    }

    public static function shippingAddress(): string
    {
        return 'shippingAddress';
    }

    /**
     * Style
     * @return bool
     */
    public static function hasStyle(): bool
    {
        return static::enabled(static::style());
    }

    public static function style(): string
    {
        return 'style';
    }

    /**
     * despatch
     * @return bool
     */
    public static function hasDespatch(): bool
    {
        return static::enabled(static::despatch());
    }

    public static function despatch(): string
    {
        return 'despatch';
    }


    /**
     * colour
     * @return bool
     */
    public static function hasColour(): bool
    {
        return static::enabled(static::colour());
    }

    public static function colour(): string
    {
        return 'colour';
    }


    /**
     * size
     * @return bool
     */
    public static function hasSize(): bool
    {
        return static::enabled(static::size());
    }

    public static function size(): string
    {
        return 'size';
    }

    /**
     * Description
     * @return bool
     */
    public static function hasProductDescription(): bool
    {
        return static::enabled(static::productDescription());
    }

    public static function productDescription(): string
    {
        return 'productDescription';
    }

    /**
     * Transport
     * @return bool
     */
    public static function hasTransport(): bool
    {
        return static::enabled(static::transport());
    }

    public static function transport(): string
    {
        return 'transport';
    }

    /**
     * Destination
     * @return bool
     */
    public static function hasDestination(): bool
    {
        return static::enabled(static::destination());
    }

    public static function destination(): string
    {
        return 'destination';
    }

    /**
     * Bundle
     * @return bool
     */
    public static function hasBundle(): bool
    {
        return static::enabled(static::bundle());
    }

    public static function bundle(): string
    {
        return 'bundle';
    }

    /**
     * Po
     * @return bool
     */
    public static function hasPo(): bool
    {
        return static::enabled(static::po());
    }

    public static function po(): string
    {
        return 'po';
    }

    /**
     * Dc
     * @return bool
     */
    public static function hasDc(): bool
    {
        return static::enabled(static::dc());
    }

    public static function dc(): string
    {
        return 'dc';
    }

}


