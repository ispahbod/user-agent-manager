<?php

namespace Ispahbod\UserAgentManager;

class UserAgentManager
{
    protected $userAgent;

    public function __construct($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    public function isMobile()
    {
        return preg_match('/Mobile|Android|BlackBerry|IEMobile|Silk/', $this->userAgent);
    }

    public function isTablet()
    {
        return preg_match('/Tablet|iPad/', $this->userAgent);
    }

    public function isPC()
    {
        return !$this->isMobile() && !$this->isTablet();
    }

    public function isAndroid()
    {
        return preg_match('/Android/', $this->userAgent);
    }

    public function isIOS()
    {
        return preg_match('/iPhone|iPad|iPod/', $this->userAgent);
    }

    public function isWindows()
    {
        return preg_match('/Windows/', $this->userAgent);
    }

    public function isMac()
    {
        return preg_match('/Macintosh|Mac OS X/', $this->userAgent);
    }

    public function isLinux()
    {
        return preg_match('/Linux/', $this->userAgent);
    }

    public function isBot()
    {
        return preg_match('/bot|crawl|slurp|spider/i', $this->userAgent);
    }

    public function isInternetExplorer()
    {
        return preg_match('/MSIE|Trident/', $this->userAgent);
    }

    public function isWeChat()
    {
        return preg_match('/MicroMessenger/', $this->userAgent);
    }

    public function isFacebook()
    {
        return preg_match('/FBAV|FBAN/', $this->userAgent);
    }

    public function isInstagram()
    {
        return preg_match('/Instagram/', $this->userAgent);
    }

    public function isTwitter()
    {
        return preg_match('/Twitter/', $this->userAgent);
    }

    public function isLinkedIn()
    {
        return preg_match('/LinkedIn/', $this->userAgent);
    }

    public function isPinterest()
    {
        return preg_match('/Pinterest/', $this->userAgent);
    }

    public function isSnapchat()
    {
        return preg_match('/Snapchat/', $this->userAgent);
    }

    public function isTikTok()
    {
        return preg_match('/TikTok/', $this->userAgent);
    }

    public function isYouTube()
    {
        return preg_match('/YouTube/', $this->userAgent);
    }

    public function isVivaldi()
    {
        return preg_match('/Vivaldi/', $this->userAgent);
    }

    public function isBrave()
    {
        return preg_match('/Brave/', $this->userAgent);
    }

    public function isDuckDuckGo()
    {
        return preg_match('/DuckDuckGo/', $this->userAgent);
    }

    public function isYandex()
    {
        return preg_match('/YaBrowser/', $this->userAgent);
    }

    public function isSamsungBrowser()
    {
        return preg_match('/SamsungBrowser/', $this->userAgent);
    }

    public function isUC()
    {
        return preg_match('/UCBrowser/', $this->userAgent);
    }

    public function isQQ()
    {
        return preg_match('/QQBrowser/', $this->userAgent);
    }

    public function isBaidu()
    {
        return preg_match('/Baidu/', $this->userAgent);
    }

    public function isOperaMini()
    {
        return preg_match('/Opera Mini/', $this->userAgent);
    }

    public function isOperaMobile()
    {
        return preg_match('/Opera Mobi/', $this->userAgent);
    }

    public function isSafari()
    {
        return preg_match('/Safari/', $this->userAgent) && !$this->isChrome();
    }

    public function isChrome()
    {
        return preg_match('/Chrome/', $this->userAgent);
    }

    public function isFirefox()
    {
        return preg_match('/Firefox/', $this->userAgent);
    }

    public function isEdge()
    {
        return preg_match('/Edge/', $this->userAgent);
    }

    public function isOpera()
    {
        return preg_match('/Opera|OPR/', $this->userAgent);
    }

    public function getOperatingSystem()
    {
        if ($this->isWindows()) {
            return 'Windows';
        } elseif ($this->isMac()) {
            return 'Mac';
        } elseif ($this->isAndroid()) {
            return 'Android';
        } elseif ($this->isIOS()) {
            return 'iOS';
        } elseif ($this->isLinux()) {
            return 'Linux';
        } else {
            return 'Unknown';
        }
    }

    public function getDevice()
    {
        if ($this->isMobile()) {
            return 'Mobile';
        } elseif ($this->isTablet()) {
            return 'Tablet';
        } else {
            return 'PC';
        }
    }

    public function getBrowser()
    {
        if ($this->isChrome()) {
            return 'Chrome';
        } elseif ($this->isSafari()) {
            return 'Safari';
        } elseif ($this->isFirefox()) {
            return 'Firefox';
        } elseif ($this->isEdge()) {
            return 'Edge';
        } elseif ($this->isOpera()) {
            return 'Opera';
        } elseif ($this->isVivaldi()) {
            return 'Vivaldi';
        } elseif ($this->isBrave()) {
            return 'Brave';
        } elseif ($this->isDuckDuckGo()) {
            return 'DuckDuckGo';
        } elseif ($this->isYandex()) {
            return 'Yandex';
        } elseif ($this->isSamsungBrowser()) {
            return 'SamsungBrowser';
        } elseif ($this->isUC()) {
            return 'UCBrowser';
        } elseif ($this->isQQ()) {
            return 'QQBrowser';
        } elseif ($this->isBaidu()) {
            return 'Baidu';
        } else {
            return 'Unknown';
        }
    }

    public function getBrowserVersion()
    {
        preg_match('/(Chrome|Firefox|Safari|Edge|Opera|OPR|Vivaldi|Brave|DuckDuckGo|YaBrowser|SamsungBrowser|UCBrowser|QQBrowser|Baidu)\/([0-9\.]+)/', $this->userAgent, $matches);
        return $matches[2] ?? 'Unknown';
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getLanguage()
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

    public function getPlatform()
    {
        if ($this->isWindows()) {
            return 'Windows';
        } elseif ($this->isMac()) {
            return 'Mac';
        } elseif ($this->isLinux()) {
            return 'Linux';
        } elseif ($this->isAndroid()) {
            return 'Android';
        } elseif ($this->isIOS()) {
            return 'iOS';
        } else {
            return 'Unknown';
        }
    }

    public function getDeviceType()
    {
        if ($this->isMobile()) {
            return 'Mobile';
        } elseif ($this->isTablet()) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }

    public function getBrowserEngine()
    {
        if ($this->isChrome() || $this->isOpera() || $this->isEdge() || $this->isBrave() || $this->isVivaldi()) {
            return 'Blink';
        } elseif ($this->isFirefox()) {
            return 'Gecko';
        } elseif ($this->isSafari()) {
            return 'WebKit';
        } elseif ($this->isInternetExplorer()) {
            return 'Trident';
        } else {
            return 'Unknown';
        }
    }

    public function generateWindowsUserAgent()
    {
        $windowsVersions = ['Windows NT 10.0', 'Windows NT 6.3', 'Windows NT 6.2', 'Windows NT 6.1', 'Windows NT 6.0', 'Windows NT 5.1'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; Win64; x64; rv:%s) Gecko/20100101 Firefox/%s',
            'Edge' => 'Mozilla/5.0 (%s; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36 Edg/%s'
        ];

        $windowsVersion = $windowsVersions[array_rand($windowsVersions)];
        $browser = array_rand($browsers);
        $version = rand(60, 90) . '.0';

        return sprintf($browsers[$browser], $windowsVersion, $version, $version);
    }

    public function generateMacUserAgent()
    {
        $macVersions = ['Intel Mac OS X 10_15_7', 'Intel Mac OS X 10_14_6', 'Intel Mac OS X 10_13_6'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; rv:%s) Gecko/20100101 Firefox/%s',
            'Safari' => 'Mozilla/5.0 (%s) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/%s Safari/605.1.15'
        ];

        $macVersion = $macVersions[array_rand($macVersions)];
        $browser = array_rand($browsers);
        $version = rand(60, 90) . '.0';

        return sprintf($browsers[$browser], $macVersion, $version, $version);
    }

    public function generateLinuxUserAgent()
    {
        $linuxDistributions = ['X11; Ubuntu; Linux x86_64', 'X11; Fedora; Linux x86_64', 'X11; Debian; Linux x86_64'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (%s) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (%s; rv:%s) Gecko/20100101 Firefox/%s'
        ];

        $linuxDistribution = $linuxDistributions[array_rand($linuxDistributions)];
        $browser = array_rand($browsers);
        $version = rand(60, 90) . '.0';

        return sprintf($browsers[$browser], $linuxDistribution, $version, $version);
    }

    public function generateAndroidUserAgent()
    {
        $androidVersions = ['Android 10', 'Android 9', 'Android 8.1', 'Android 8.0', 'Android 7.1.1', 'Android 7.0'];
        $browsers = [
            'Chrome' => 'Mozilla/5.0 (Linux; %s; Nexus 5 Build/JOP40D) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/%s Mobile Safari/537.36',
            'Firefox' => 'Mozilla/5.0 (Android %s; Mobile; rv:%s) Gecko/%s Firefox/%s'
        ];

        $androidVersion = $androidVersions[array_rand($androidVersions)];
        $browser = array_rand($browsers);
        $version = rand(60, 90) . '.0';

        return sprintf($browsers[$browser], $androidVersion, $version, $version, $version);
    }

    public function generateIOSUserAgent()
    {
        $iosVersions = ['CPU iPhone OS 14_0 like Mac OS X', 'CPU iPhone OS 13_3 like Mac OS X', 'CPU iPhone OS 12_4 like Mac OS X'];
        $browsers = [
            'Safari' => 'Mozilla/5.0 (iPhone; %s) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/%s Mobile/15E148 Safari/604.1',
            'Chrome' => 'Mozilla/5.0 (iPhone; %s) AppleWebKit/537.36 (KHTML, like Gecko) CriOS/%s Mobile/15E148 Safari/604.1',
            'Firefox' => 'Mozilla/5.0 (iPhone; %s; rv:%s) Gecko/%s Firefox/%s'
        ];

        $iosVersion = $iosVersions[array_rand($iosVersions)];
        $browser = array_rand($browsers);
        $version = rand(60, 90) . '.0';

        return sprintf($browsers[$browser], $iosVersion, $version, $version, $version);
    }
}