<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZodiacController extends Controller
{
    public function show(Request $request)
    {
        $zodiacs = [
            'aries',
            'taurus',
            'gemini',
            'cancer',
            'leo',
            'virgo',
            'libra',
            'scorpio',
            'sagittarius',
            'capricorn',
            'aquarius',
            'pisces',
        ];

        $messages = [
            'aries' => [
                "You’re charging into bugs head-first. Respect.",
                "If it works, don’t ask why. Aries vibes.",
                "You're refactoring before the app even loads. Classic Aries.",
                "Push first, test later. It'll work (probably).",
                "You're sprinting through features like a RAM upgrade.",
                "No docs? No problem. You blaze your own path.",
                "That infinite loop was just your passion showing."
            ],
            'taurus' => [
                "Slow and steady (and stubborn) wins the merge.",
                "You're the code anchor this repo needs.",
                "You won’t stop coding until it’s perfect. And that’s why it works.",
                "You've been tweaking padding for 2 hours. Taurus-approved dedication.",
                "Slow and stable pushes the cleanest commits.",
                "You refused to use a package. You built your own.",
                "Commit message: 'I fixed it properly this time.'"
            ],
            'gemini' => [
                "Pair programming with yourself? Classic Gemini.",
                "Your code has more branches than your thoughts.",
                "You're writing a feature and a blog post about it at the same time.",
                "Yes, your comments talk more than your code.",
                "You switch between tabs and frameworks mid-sentence.",
                "You debug out loud, and it actually works.",
                "You started a new side project… again."
            ],
            'cancer' => [
                "You protect your code like it’s family.",
                "Sensitive to errors, but always fixes them.",
                "You named a variable after your cat. It’s adorable and it works.",
                "You left a kind comment in the code for future devs.",
                "You fix other people's bugs like it’s your love language.",
                "Your pull request descriptions are small novels.",
                "You quietly cried when `git reset --hard` worked too well."
            ],
            'leo' => [
                "Your commits are as bold as your personality.",
                "Spotlight on you: code review king/queen.",
                "You pushed the commit and announced it in 3 Slack channels.",
                "Your README has its own logo. Leo energy.",
                "You wrote a custom button component — and it shines.",
                "You fixed a bug and took a victory lap.",
                "Your portfolio has more animations than your codebase."
            ],
            'virgo' => [
                "No bug escapes your meticulous eye.",
                "Your code is cleaner than a fresh install.",
                "You linted the README. That’s Virgo-level precision.",
                "You noticed the semicolon was misaligned — and fixed it.",
                "You debugged a typo in someone else's branch.",
                "You checked every checkbox in the issue. Twice.",
                "You refused to deploy until every test passed. Respect."
            ],
            'libra' => [
                "Balancing features and bugs like a pro.",
                "You refactor for harmony in the codebase.",
                "You've redesigned the same UI three times. It gets better every time.",
                "Your CSS grid is symmetrical perfection.",
                "You can’t decide between two color palettes — so you coded both.",
                "You argue for both sides in code reviews. And you’re right.",
                "You deployed at 3am because it *felt right*."
            ],
            'scorpio' => [
                "You debug with intensity and passion.",
                "Your code has secrets only you understand.",
                "You refactored the entire backend silently. It just works now.",
                "Your code has hidden layers like an onion — or a Scorpio.",
                "You're the one who uses Git rebase — with power.",
                "You knew that bug was lurking... and hunted it down.",
                "You deleted 200 lines without blinking."
            ],
            'sagittarius' => [
                "You explore new frameworks for fun.",
                "Adventure awaits in every pull request.",
                "You installed a new framework just to try it. It’s been 4 hours.",
                "You told a joke in a commit message. Twice.",
                "Your console logs are basically a travel blog.",
                "You turned a bug into a feature and explained why.",
                "Your branch names are chaotic good: `final-final-real-final`."
            ],
            'capricorn' => [
                "You climb every coding mountain.",
                "Disciplined commits, legendary uptime.",
                "Your code is boring — and that’s why it never breaks.",
                "You wrote a deployment script no one dares to touch.",
                "You lead code reviews like meetings. Efficient and silent.",
                "You wrote the README before the app.",
                "You’re silently building an empire from `main`."
            ],
            'aquarius' => [
                "You invent solutions nobody else imagines.",
                "Your code is ahead of its time.",
                "You committed quantum ideas to Git. Or at least async/await.",
                "You forked your own project to challenge yourself.",
                "You’re already using tools no one’s heard of yet.",
                "Your code is a bit chaotic, but *brilliantly* so.",
                "You built your own CLI because why not."
            ],
            'pisces' => [
                "Your functions dream of better days.",
                "Floaty, but the code compiles. Magic.",
                "You write poetic comments. They might be song lyrics.",
                "You stayed up all night fixing a feature no one asked for.",
                "Your CSS has ✨ vibes ✨.",
                "You zoned out and created a beautiful animation.",
                "You cried, then fixed it with one line. Magic."
            ],
        ];

        $signEmojis = [
            'aries' => '♈️',
            'taurus' => '♉️',
            'gemini' => '♊️',
            'cancer' => '♋️',
            'leo' => '♌️',
            'virgo' => '♍️',
            'libra' => '♎️',
            'scorpio' => '♏️',
            'sagittarius' => '♐️',
            'capricorn' => '♑️',
            'aquarius' => '♒️',
            'pisces' => '♓️',
        ];

        $sign = strtolower($request->query('sign'));
        $theme = strtolower($request->query('theme'));

        if (!$theme) {
            $theme = 'dark';
        }

        if (!in_array($sign, $zodiacs)) {
            $sign = 'cancer';
        }

        $message = $messages[$sign][array_rand($messages[$sign])];
        $emoji = $signEmojis[$sign];


        return response()
            ->view('zodiac.zodiac', compact(
                'sign',
                'message',
                'emoji',
                'theme'
            ))
            ->header('Content-Type', 'image/svg+xml');
    }
}
