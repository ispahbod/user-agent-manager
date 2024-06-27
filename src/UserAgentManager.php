<?php

namespace Ispahbod\UserAgentManager;

use Random\RandomException;

class UserAgentManager
{
    protected string $userAgent;

    public function __construct(string $userAgent)
    {
        $this->userAgent = $userAgent;
    }

    public function isMobile(): bool
    {
        return preg_match('/Mobile|Android|BlackBerry|IEMobile|Silk/', $this->userAgent);
    }

    public function isTablet(): bool
    {
        return preg_match('/Tablet|iPad/', $this->userAgent);
    }

    public function isPC(): bool
    {
        return !$this->isMobile() && !$this->isTablet();
    }

    public function isAndroid(): bool
    {
        return str_contains($this->userAgent, "Android");
    }

    public function isIOS(): bool
    {
        return preg_match('/iPhone|iPad|iPod/', $this->userAgent);
    }

    public function isWindows(): bool
    {
        return str_contains($this->userAgent, "Windows");
    }

    public function isMac(): bool
    {
        return preg_match('/Macintosh|Mac OS X/', $this->userAgent);
    }

    public function isLinux(): bool
    {
        return str_contains($this->userAgent, "Linux");
    }

    public function isBot(): bool
    {
        return preg_match('/bot|crawl|slurp|spider/i', $this->userAgent);
    }

    public function isInternetExplorer(): bool
    {
        return preg_match('/MSIE|Trident/', $this->userAgent);
    }

    public function isWeChat(): bool
    {
        return str_contains($this->userAgent, "MicroMessenger");
    }

    public function isFacebook(): bool
    {
        return preg_match('/FBAV|FBAN/', $this->userAgent);
    }

    public function isInstagram(): bool
    {
        return str_contains($this->userAgent, "Instagram");
    }

    public function isTwitter(): bool
    {
        return str_contains($this->userAgent, "Twitter");
    }

    public function isLinkedIn(): bool
    {
        return str_contains($this->userAgent, "LinkedIn");
    }

    public function isPinterest(): bool
    {
        return str_contains($this->userAgent, "Pinterest");
    }

    public function isSnapchat(): bool
    {
        return str_contains($this->userAgent, "Snapchat");
    }

    public function isTikTok(): bool
    {
        return str_contains($this->userAgent, "TikTok");
    }

    public function isYouTube(): bool
    {
        return str_contains($this->userAgent, "YouTube");
    }

    public function isVivaldi(): bool
    {
        return str_contains($this->userAgent, "Vivaldi");
    }

    public function isBrave(): bool
    {
        return str_contains($this->userAgent, "Brave");
    }

    public function isDuckDuckGo(): bool
    {
        return str_contains($this->userAgent, "DuckDuckGo");
    }

    public function isYandex(): bool
    {
        return str_contains($this->userAgent, "YaBrowser");
    }

    public function isSamsungBrowser(): bool
    {
        return str_contains($this->userAgent, "SamsungBrowser");
    }

    public function isUC(): bool
    {
        return str_contains($this->userAgent, "UCBrowser");
    }

    public function isQQ(): bool
    {
        return str_contains($this->userAgent, "QQBrowser");
    }

    public function isBaidu(): bool
    {
        return str_contains($this->userAgent, "Baidu");
    }

    public function isOperaMini(): bool
    {
        return str_contains($this->userAgent, 'Opera Mini');
    }

    public function isOperaMobile(): bool
    {
        return str_contains($this->userAgent, 'Opera Mobi');
    }

    public function isSafari(): bool
    {
        return str_contains($this->userAgent, "Safari") && !$this->isChrome();
    }

    public function isChrome(): bool
    {
        return str_contains($this->userAgent, "Chrome");
    }

    public function isFirefox(): bool
    {
        return str_contains($this->userAgent, "Firefox");
    }

    public function isEdge(): bool
    {
        return str_contains($this->userAgent, "Edge");
    }

    public function isOpera(): bool
    {
        return preg_match('/Opera|OPR/', $this->userAgent);
    }

    public function getOperatingSystem(): string
    {
        if ($this->isWindows()) {
            return 'Windows';
        }

        if ($this->isMac()) {
            return 'Mac';
        }

        if ($this->isAndroid()) {
            return 'Android';
        }

        if ($this->isIOS()) {
            return 'iOS';
        }

        if ($this->isLinux()) {
            return 'Linux';
        }

        return 'Unknown';
    }

    public function getDevice(): string
    {
        if ($this->isMobile()) {
            return 'Mobile';
        }

        if ($this->isTablet()) {
            return 'Tablet';
        }

        return 'PC';
    }

    public function getBrowser(): string
    {
        if ($this->isChrome()) {
            return 'Chrome';
        }

        if ($this->isSafari()) {
            return 'Safari';
        }

        if ($this->isFirefox()) {
            return 'Firefox';
        }

        if ($this->isEdge()) {
            return 'Edge';
        }

        if ($this->isOpera()) {
            return 'Opera';
        }

        if ($this->isVivaldi()) {
            return 'Vivaldi';
        }

        if ($this->isBrave()) {
            return 'Brave';
        }

        if ($this->isDuckDuckGo()) {
            return 'DuckDuckGo';
        }

        if ($this->isYandex()) {
            return 'Yandex';
        }

        if ($this->isSamsungBrowser()) {
            return 'SamsungBrowser';
        }

        if ($this->isUC()) {
            return 'UCBrowser';
        }

        if ($this->isQQ()) {
            return 'QQBrowser';
        }

        if ($this->isBaidu()) {
            return 'Baidu';
        }

        return 'Unknown';
    }

    public function getBrowserVersion(): string
    {
        preg_match('/(Chrome|Firefox|Safari|Edge|Opera|OPR|Vivaldi|Brave|DuckDuckGo|YaBrowser|SamsungBrowser|UCBrowser|QQBrowser|Baidu)\/([0-9\.]+)/', $this->userAgent, $matches);
        return $matches[2] ?? 'Unknown';
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function getLanguage(): string
    {
        preg_match('/\(([^)]+)\)/', $this->userAgent, $matches);
        if (isset($matches[1])) {
            $parts = explode(';', $matches[1]);
            foreach ($parts as $part) {
                if (preg_match('/^[a-z]{2}-[A-Z]{2}$/', trim($part))) {
                    return trim($part);
                }
            }
        }
        return 'Unknown';
    }

    public function getPlatform(): string
    {
        if ($this->isWindows()) {
            return 'Windows';
        }

        if ($this->isMac()) {
            return 'Mac';
        }

        if ($this->isLinux()) {
            return 'Linux';
        }

        if ($this->isAndroid()) {
            return 'Android';
        }

        if ($this->isIOS()) {
            return 'iOS';
        }

        return 'Unknown';
    }

    public function getDeviceType(): string
    {
        if ($this->isMobile()) {
            return 'Mobile';
        }

        if ($this->isTablet()) {
            return 'Tablet';
        }

        return 'Desktop';
    }

    public function getBrowserEngine(): string
    {
        if ($this->isChrome() || $this->isOpera() || $this->isEdge() || $this->isBrave() || $this->isVivaldi()) {
            return 'Blink';
        }

        if ($this->isFirefox()) {
            return 'Gecko';
        }

        if ($this->isSafari()) {
            return 'WebKit';
        }

        if ($this->isInternetExplorer()) {
            return 'Trident';
        }

        return 'Unknown';
    }

    /**
     * @throws RandomException
     */
    public static function generateWindowsUserAgent(): string
    {
        $windowsVersions = ['Windows NT 10.0', 'Windows NT 6.3', 'Windows NT 6.2', 'Windows NT 6.1', 'Windows NT 6.0', 'Windows NT 5.1'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; Win64; x64; rv:%s) Gecko/20100101 Firefox/%s',
            'Edge' => 'Mozilla/5.0 (%s; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36 Edg/%s'
        ];

        $windowsVersion = $windowsVersions[array_rand($windowsVersions)];
        $browser = array_rand($browsers);
        $version = random_int(60, 90) . '.0';

        return sprintf($browsers[$browser], $windowsVersion, $version, $version);
    }

    /**
     * @throws RandomException
     */
    public  static function generateMacUserAgent(): string
    {
        $macVersions = ['Intel Mac OS X 10_15_7', 'Intel Mac OS X 10_14_6', 'Intel Mac OS X 10_13_6'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; rv:%s) Gecko/20100101 Firefox/%s',
            'Safari' => 'Mozilla/5.0 (%s) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/%s Safari/605.1.15'
        ];

        $macVersion = $macVersions[array_rand($macVersions)];
        $browser = array_rand($browsers);
        $version = random_int(60, 90) . '.0';

        return sprintf($browsers[$browser], $macVersion, $version, $version);
    }

    /**
     * @throws RandomException
     */
    public static function generateLinuxUserAgent(): string
    {
        $linuxDistributions = ['X11; Ubuntu; Linux x86_64', 'X11; Fedora; Linux x86_64', 'X11; Debian; Linux x86_64'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; rv:%s) Gecko/20100101 Firefox/%s'
        ];

        $linuxDistribution = $linuxDistributions[array_rand($linuxDistributions)];
        $browser = array_rand($browsers);
        $version = random_int(60, 90) . '.0';

        return sprintf($browsers[$browser], $linuxDistribution, $version, $version);
    }

    /**
     * @throws RandomException
     */
    public static function generateAndroidUserAgent(): string
    {
        $androidVersions = ['Android 10', 'Android 9', 'Android 8.1', 'Android 8.0', 'Android 7.1.1', 'Android 7.0'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (Linux; %s; Nexus 5 Build/JOP40D) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Mobile Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (Android %s; Mobile; rv:%s) Gecko/%s Firefox/%s'
        ];

        $androidVersion = $androidVersions[array_rand($androidVersions)];
        $browser = array_rand($browsers);
        $version = random_int(60, 90) . '.0';

        return sprintf($browsers[$browser], $androidVersion, $version, $version, $version);
    }

    /**
     * @throws RandomException
     */
    public static function generateIOSUserAgent(): string
    {
        $iosVersions = ['CPU iPhone OS 14_0 like Mac OS X', 'CPU iPhone OS 13_3 like Mac OS X', 'CPU iPhone OS 12_4 like Mac OS X'];
        $browsers = [
            'Safari' => 'Mozilla/5.0 (iPhone; %s) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/%s Mobile/15E148 Safari/604.1',
            'Chrome' => 'Mozilla/5.0 (iPhone; %s) AppleWebKit/537.36 (KHTML, like Gecko) CriOS/%s Mobile/15E148 Safari/604.1',
            'Firefox' => 'Mozilla/5.0 (iPhone; %s; rv:%s) Gecko/%s Firefox/%s'
        ];

        $iosVersion = $iosVersions[array_rand($iosVersions)];
        $browser = array_rand($browsers);
        $version = random_int(60, 90) . '.0';

        return sprintf($browsers[$browser], $iosVersion, $version, $version, $version);
    }

    public function isCrawler(): bool
    {
        return preg_match('/bot|crawl|slurp|spider|mediapartners/i', $this->userAgent);
    }

    public function isRealUser(): bool
    {
        return !$this->isCrawler() && !$this->isInvalidUserAgent();
    }

    public function isValidUserAgent(): bool
    {
        return preg_match('/Mozilla|Chrome|Safari|Opera|Firefox|Edge|MSIE|Trident/', $this->userAgent);
    }

    public function isInvalidUserAgent(): bool
    {
        return !$this->isValidUserAgent();
    }

    public function isSmartTV(): bool
    {
        return preg_match('/SmartTV|Tizen|Web0S|NetCast|HbbTV|Viera|Aquos|BRAVIA|CE-HTML|Opera TV|GoogleTV|DTV/i', $this->userAgent);
    }

    public function isConsole(): bool
    {
        return preg_match('/PlayStation|Xbox|Nintendo/i', $this->userAgent);
    }

    public function isWearable(): bool
    {
        return preg_match('/Watch|Wear|Glass/i', $this->userAgent);
    }

    public function isCarBrowser(): bool
    {
        return preg_match('/QtCarBrowser|Tesla/i', $this->userAgent);
    }

    public function isEReader(): bool
    {
        return preg_match('/Kindle|Silk|Kobo|Nook/i', $this->userAgent);
    }

    public function isDesktop(): bool
    {
        return !$this->isMobile() && !$this->isTablet() && !$this->isSmartTV() && !$this->isConsole() && !$this->isWearable() && !$this->isCarBrowser() && !$this->isEReader();
    }
}