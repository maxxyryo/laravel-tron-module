<?php

namespace PavloDotDev\LaravelTronModule\Commands;

use Illuminate\Console\Command;
use PavloDotDev\LaravelTronModule\Jobs\SyncWalletJob;
use PavloDotDev\LaravelTronModule\Models\TronWallet;

class TronScanCommand extends Command
{
    protected $signature = 'tron:scan';

    protected $description = 'Start wallets synchronization';

    public function handle(): void
    {
        /** @var class-string<TronWallet> $walletModel */
        $walletModel = config('tron.models.wallet');

        $walletModel::query()
            ->whereHas('addresses')
            ->each(fn(TronWallet $wallet) => SyncWalletJob::dispatch($wallet));
    }
}
