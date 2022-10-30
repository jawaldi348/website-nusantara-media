<?php

namespace App\Libraries;

use CodeIgniter\Model;

/**
 * Description of Visitor
 *
 * @author https://nusantaramedia.co.id/
 */
class Visitor
{
    private $db;
    private $request;

    /*
     * Don't count hits from search robots and crawlers. 
     */
    private $IGNORE_SEARCH_BOTS = TRUE;

    /*
     * Don't count the hit if the browser sends the DNT: 1 header.
     */
    private $HONOR_DO_NOT_TRACK = FALSE;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }
    function track_visitor()
    {
        $proceed = TRUE;

        if ($this->IGNORE_SEARCH_BOTS && $this->is_bot()) {
            $proceed = FALSE;
        }

        if ($this->HONOR_DO_NOT_TRACK && !allow_tracking()) {
            $proceed = FALSE;
        }

        if ($proceed === TRUE) :
            $session = session();
            $idsess = $session->session_id;

            $agent = $this->request->getUserAgent();

            if ($agent->isBrowser()) :
                $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
            elseif ($agent->isRobot()) :
                $currentAgent = $agent->getRobot();
            elseif ($agent->isMobile()) :
                $currentAgent = $agent->getMobile();
            else :
                $currentAgent = 'Unidentified User Agent';
            endif;

            $sql = $this->db->table('visitor')
                ->orderBy('id', 'desc')
                ->limit(1)
                ->getWhere(['session_id' => $idsess])
                ->getRowArray();
            if ($sql) :
                if (time() - strtotime($sql['created_at']) > 60) :
                    $data = array(
                        'session_id' => $idsess,
                        'ip_address' => $this->request->getIPAddress(),
                        'requested_url' => $this->request->uri,
                        'referer_page' => $this->request->getUserAgent()->getReferrer(),
                        'user_agent' => $this->request->getUserAgent(),
                        'platform' => $agent->getPlatform(),
                        'browser' => $currentAgent,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->db->table('visitor')->insert($data);
                endif;
            else :
                $data = array(
                    'session_id' => $idsess,
                    'ip_address' => $this->request->getIPAddress(),
                    'requested_url' => $this->request->uri,
                    'referer_page' => $this->request->getUserAgent()->getReferrer(),
                    'user_agent' => $this->request->getUserAgent(),
                    'platform' => $agent->getPlatform(),
                    'browser' => $currentAgent,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->table('visitor')->insert($data);
            endif;
        endif;
    }
    function track_visitor_content($idpost, $jenis)
    {
        $proceed = TRUE;

        if ($this->IGNORE_SEARCH_BOTS && $this->is_bot()) {
            $proceed = FALSE;
        }

        if ($this->HONOR_DO_NOT_TRACK && !allow_tracking()) {
            $proceed = FALSE;
        }

        if ($proceed === TRUE) {
            $session = session();
            $idsess = $session->session_id;

            $sql = $this->db->table('post_visitor')
                ->orderBy('id_post_visitor', 'desc')
                ->getWhere(['idpost_visitor' => $idpost, 'idsess_user' => $idsess])
                ->getRowArray();
            $sql_post = $this->db->table('posts')->getWhere(['id_post' => $idpost])->getRowArray();
            if (isset($sql)) :
                if (time() - strtotime($sql['created_at']) > 60) :
                    $data = array(
                        'idpost_visitor' => $idpost,
                        'ip_address' => $this->request->getIPAddress(),
                        'idsess_user' => $idsess,
                        'requested_url' => $this->request->uri,
                        'referer_page' => $this->request->getUserAgent()->getReferrer(),
                        'jenis_post' => $jenis,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->db->table('post_visitor')->insert($data);
                    if (isset($sql_post)) :
                        $post = array(
                            'visit_post' => $sql_post['visit_post'] + 1,
                        );
                        $this->db->table('posts')->where('id_post', $idpost)->update($post);
                    endif;
                endif;
            else :
                $data = array(
                    'idpost_visitor' => $idpost,
                    'ip_address' => $this->request->getIPAddress(),
                    'idsess_user' => $idsess,
                    'requested_url' => $this->request->uri,
                    'referer_page' => $this->request->getUserAgent()->getReferrer(),
                    'jenis_post' => $jenis,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->table('post_visitor')->insert($data);
                if (isset($sql_post)) :
                    $post = array(
                        'visit_post' => $sql_post['visit_post'] + 1,
                    );
                    $this->db->table('posts')->where('id_post', $idpost)->update($post);
                endif;
            endif;
        }
    }

    /**
     * check whether bot
     * 
     * @return	bool
     */
    private function is_bot()
    {
        // Of course, this is not perfect, but it at least catches the major
        // search engines that index most often.
        $spiders = array(
            "abot",
            "dbot",
            "ebot",
            "hbot",
            "kbot",
            "lbot",
            "mbot",
            "nbot",
            "obot",
            "pbot",
            "rbot",
            "sbot",
            "tbot",
            "vbot",
            "ybot",
            "zbot",
            "bot.",
            "bot/",
            "_bot",
            ".bot",
            "/bot",
            "-bot",
            ":bot",
            "(bot",
            "crawl",
            "slurp",
            "spider",
            "seek",
            "accoona",
            "acoon",
            "adressendeutschland",
            "ah-ha.com",
            "ahoy",
            "altavista",
            "ananzi",
            "anthill",
            "appie",
            "arachnophilia",
            "arale",
            "araneo",
            "aranha",
            "architext",
            "aretha",
            "arks",
            "asterias",
            "atlocal",
            "atn",
            "atomz",
            "augurfind",
            "backrub",
            "bannana_bot",
            "baypup",
            "bdfetch",
            "big brother",
            "biglotron",
            "bjaaland",
            "blackwidow",
            "blaiz",
            "blog",
            "blo.",
            "bloodhound",
            "boitho",
            "booch",
            "bradley",
            "butterfly",
            "calif",
            "cassandra",
            "ccubee",
            "cfetch",
            "charlotte",
            "churl",
            "cienciaficcion",
            "cmc",
            "collective",
            "comagent",
            "combine",
            "computingsite",
            "csci",
            "curl",
            "cusco",
            "daumoa",
            "deepindex",
            "delorie",
            "depspid",
            "deweb",
            "die blinde kuh",
            "digger",
            "ditto",
            "dmoz",
            "docomo",
            "download express",
            "dtaagent",
            "dwcp",
            "ebiness",
            "ebingbong",
            "e-collector",
            "ejupiter",
            "emacs-w3 search engine",
            "esther",
            "evliya celebi",
            "ezresult",
            "falcon",
            "felix ide",
            "ferret",
            "fetchrover",
            "fido",
            "findlinks",
            "fireball",
            "fish search",
            "fouineur",
            "funnelweb",
            "gazz",
            "gcreep",
            "genieknows",
            "getterroboplus",
            "geturl",
            "glx",
            "goforit",
            "golem",
            "grabber",
            "grapnel",
            "gralon",
            "griffon",
            "gromit",
            "grub",
            "gulliver",
            "hamahakki",
            "harvest",
            "havindex",
            "helix",
            "heritrix",
            "hku www octopus",
            "homerweb",
            "htdig",
            "html index",
            "html_analyzer",
            "htmlgobble",
            "hubater",
            "hyper-decontextualizer",
            "ia_archiver",
            "ibm_planetwide",
            "ichiro",
            "iconsurf",
            "iltrovatore",
            "image.kapsi.net",
            "imagelock",
            "incywincy",
            "indexer",
            "infobee",
            "informant",
            "ingrid",
            "inktomisearch.com",
            "inspector web",
            "intelliagent",
            "internet shinchakubin",
            "ip3000",
            "iron33",
            "israeli-search",
            "ivia",
            "jack",
            "jakarta",
            "javabee",
            "jetbot",
            "jumpstation",
            "katipo",
            "kdd-explorer",
            "kilroy",
            "knowledge",
            "kototoi",
            "kretrieve",
            "labelgrabber",
            "lachesis",
            "larbin",
            "legs",
            "libwww",
            "linkalarm",
            "link validator",
            "linkscan",
            "lockon",
            "lwp",
            "lycos",
            "magpie",
            "mantraagent",
            "mapoftheinternet",
            "marvin/",
            "mattie",
            "mediafox",
            "mediapartners",
            "mercator",
            "merzscope",
            "microsoft url control",
            "minirank",
            "miva",
            "mj12",
            "mnogosearch",
            "moget",
            "monster",
            "moose",
            "motor",
            "multitext",
            "muncher",
            "muscatferret",
            "mwd.search",
            "myweb",
            "najdi",
            "nameprotect",
            "nationaldirectory",
            "nazilla",
            "ncsa beta",
            "nec-meshexplorer",
            "nederland.zoek",
            "netcarta webmap engine",
            "netmechanic",
            "netresearchserver",
            "netscoop",
            "newscan-online",
            "nhse",
            "nokia6682/",
            "nomad",
            "noyona",
            "nutch",
            "nzexplorer",
            "objectssearch",
            "occam",
            "omni",
            "open text",
            "openfind",
            "openintelligencedata",
            "orb search",
            "osis-project",
            "pack rat",
            "pageboy",
            "pagebull",
            "page_verifier",
            "panscient",
            "parasite",
            "partnersite",
            "patric",
            "pear.",
            "pegasus",
            "peregrinator",
            "pgp key agent",
            "phantom",
            "phpdig",
            "picosearch",
            "piltdownman",
            "pimptrain",
            "pinpoint",
            "pioneer",
            "piranha",
            "plumtreewebaccessor",
            "pogodak",
            "poirot",
            "pompos",
            "poppelsdorf",
            "poppi",
            "popular iconoclast",
            "psycheclone",
            "publisher",
            "python",
            "rambler",
            "raven search",
            "roach",
            "road runner",
            "roadhouse",
            "robbie",
            "robofox",
            "robozilla",
            "rules",
            "salty",
            "sbider",
            "scooter",
            "scoutjet",
            "scrubby",
            "search.",
            "searchprocess",
            "semanticdiscovery",
            "senrigan",
            "sg-scout",
            "shai'hulud",
            "shark",
            "shopwiki",
            "sidewinder",
            "sift",
            "silk",
            "simmany",
            "site searcher",
            "site valet",
            "sitetech-rover",
            "skymob.com",
            "sleek",
            "smartwit",
            "sna-",
            "snappy",
            "snooper",
            "sohu",
            "speedfind",
            "sphere",
            "sphider",
            "spinner",
            "spyder",
            "steeler/",
            "suke",
            "suntek",
            "supersnooper",
            "surfnomore",
            "sven",
            "sygol",
            "szukacz",
            "tach black widow",
            "tarantula",
            "templeton",
            "/teoma",
            "t-h-u-n-d-e-r-s-t-o-n-e",
            "theophrastus",
            "titan",
            "titin",
            "tkwww",
            "toutatis",
            "t-rex",
            "tutorgig",
            "twiceler",
            "twisted",
            "ucsd",
            "udmsearch",
            "url check",
            "updated",
            "vagabondo",
            "valkyrie",
            "verticrawl",
            "victoria",
            "vision-search",
            "volcano",
            "voyager/",
            "voyager-hc",
            "w3c_validator",
            "w3m2",
            "w3mir",
            "walker",
            "wallpaper",
            "wanderer",
            "wauuu",
            "wavefire",
            "web core",
            "web hopper",
            "web wombat",
            "webbandit",
            "webcatcher",
            "webcopy",
            "webfoot",
            "weblayers",
            "weblinker",
            "weblog monitor",
            "webmirror",
            "webmonkey",
            "webquest",
            "webreaper",
            "websitepulse",
            "websnarf",
            "webstolperer",
            "webvac",
            "webwalk",
            "webwatch",
            "webwombat",
            "webzinger",
            "wget",
            "whizbang",
            "whowhere",
            "wild ferret",
            "worldlight",
            "wwwc",
            "wwwster",
            "xenu",
            "xget",
            "xift",
            "xirq",
            "yandex",
            "yanga",
            "yeti",
            "yodao",
            "zao/",
            "zippp",
            "zyborg"
        );

        $agent = strtolower($this->request->getUserAgent());

        foreach ($spiders as $spider) {
            if (strpos($agent, $spider) !== FALSE)
                return TRUE;
        }

        return FALSE;
    }
}
