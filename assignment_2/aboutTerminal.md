# ターミナル(UNIX コマンド)を学ぶ
## ターミナルとは？

### シェルについて
パソコンに命令するためには、
パソコンの頭脳的なところ(※1)に命令しないといけない。
当然命令は、日本語でも出来ないし英語でも出来ない。
じゃあどのようにするかというと、
我々の言葉と、パソコンの頭脳的なところに通じる言葉の翻訳をする必要がある。
例えば「コマンドを実行する」などのコマンドをパソコンの頭脳的なところに
伝えるソフトを「シェル」という。
シェルには様々な種類がある。


- bash
- tcsh ... $が%で表示される。
- zsh ... 最近のMacOS のデフォルト、、、、など。

### ターミナルについて

このシェルを利用（コマンドを描いて実行する）するために、昔はターミナルというちょうでかいパソコン（ダム端末）が使われた。
ただし、それだとめちゃくちゃ不便。
そこで、この物理的なターミナルをソフトにしてパソコンの中に入れてみた。
ターミナルのエミュレーター(※２)なので、ターミナルエミュレーターと呼ぶ。

各OSで利用できるターミナルエミュレーターがある。
|OS|ターミナルエミュレーター |
|--|--|
|Windows|PuTTY, Tera Term|
|Mac OS|ターミナル,　iTerm2|
|Linux|Gnome, Konsole|

### 結論
ターミナルは、Mac OSで操作できるパソコンを操作するヤツ。
Windowsでは、他のソフトを利用する。（今回は Git Bash）

  
## ターミナルを触ってみる

Mac OSは、ターミナルを起動する。
WindowsではGit Bashを起動する。
※以下、Windowsの方は、ターミナルをgit bashと置き換えて見てください。

以下のような感じで表示されることを見てください。

```bash
fukushimahayato@mbp-2 ~ %
```

### プロンプト記号
hayatofukushima@mac $
ユーザー名 @ ホスト名

hayatofukushima@mac $
→ $もしくは% は一般ユーザーの場合を指す。

root@mbp-2 fukushimahayato #
→ # はroot（管理者）ユーザーの場合。

rootは権限が大きいので、いろいろな操作ができます。

ここではとりあえず、
- なんでもできるroot / 権限者 
- それ以外の一般user
がいるという認識をしておいてください。
※細かいことは自分で調べてください。

### 初めてのコマンド
以下のように記入してみてください。
```bash
$ date
2021年 10月 9日 土曜日 02時44分57秒 JST
```
通常これら説明の`$`は、プロンプト（hayatofukushima@mac $）の略です。
※一般ユーザーで操作をしなさい、という表現です。

- 以下のように記入してみてください。
```bash
$ cal
```

このように、たくさんのコマンドが用意されています。

### オプションと引数

コマンドの動作を調整する役割を持つオプションがあります。
通常 `-`のあとに、表されます。
※例外もあり。

```
// 今日の日付についているマークを隠す(hide)
$ cal -h

// オプション複数もok
$ cal -h -3

// オプションはくっつけるのもok
$ cal -h3

// コマンドによっては、引数を与えることもできる。
$ cal -j 2021 
```

## ファイルとディレクトリ
![Unixcommand](/uploads/1d541429550f1fcaa0b3e45bd9704701/Unixcommand.jpg)

※ディレクトリ = フォルダという認識でokです。

コマンドを実行する時*今どのフォルダ（階層）にいるか*ということが重要です。
`cal`コマンドは、どの階層でおこなっても問題ないですが、
例えば、ファイルをコピーする`cp`コマンドは、
**どの階層にあるファイル**を**どの階層にコピーするのか**等を
指定する必要があります。

なお、自分が今いる階層を
- カレントディレクトリ
といいます。
カレントディレクトリは、`pwd`コマンドで確認することが出来ます。

### `pwd`と`cd`の確認

配布したダウンロードファイルを解答してデスクトップにおいてください。

1. `$ pwd`を実行。表示された文字列を観察。
2. `$ cd`とかく。（ここではまだエンター押さない）
3. cd の右側に半角スペースを一つ （ここではまだエンター押さない）
4. カーソル部分にデスクトップのcolorフォルダをドラッグ&ドロップ
5. エンター！
6. `$ pwd`コマンドを実行してみる。

```bash 
$ pwd
/Users/fukushimahayato // ←コレが「ホームディレクトリ」。ターミナル or git　bash　を開いたときに最初にいる階層
$ cd /Users/fukushimahayato/Desktop/UnixCommand　// ←このディレクトリに移動
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand // ←今いるディレクトリ
```
このように、どの階層にいるのかを常に意識してください。

### `ls`の確認

カレントディレクトリ内のファイルを確認するために`ls`コマンドがあります。

```bash
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand
$ ls
color	other // ← UnixCommandディレクトリの中身がわかる。

// ↓-lオプションを追加
$ ls -l
total 8
drwxr-xr-x  5 fukushimahayato  staff  160 10  9 03:16 color
-rw-r--r--  1 fukushimahayato  staff    5 10  9 03:36 data.txt
drwxr-xr-x  2 fukushimahayato  staff   64 10  9 03:31 other
```

それぞれの意味。
- total……ファイルサイズの合計を表示しています。ブロックサイズで表記しておりデフォルトは1 ブロックは512 バイト
- （大事）drwxrwxr-x. ……ファイルの種類(一番左の一文字) とパーミッション（ファイルに対しての権限）

  - 頭が`-`... ファイル 
  - 頭が`d`...ディレクトリ
  - その他...調べてね。

- ２……ハードリンクの数 
- fukushimahayato  staff……所有者(左)と所有グループ(右) 
- 160……ファイルサイズ
- 10  9 03:16……タイムスタンプ
- （大事）work……ファイル名 or ディレクトリ名

UnixCommandから、`color/warmColors`まで移動して、`red.txt`の中身を確認する。

```bash
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand

$ ls -l // ファイルの中身をみたら、どの様な階層になったのか
total 8
drwxr-xr-x  5 fukushimahayato  staff  160 10  9 03:16 color
-rw-r--r--  1 fukushimahayato  staff    5 10  9 03:36 data.txt
drwxr-xr-x  2 fukushimahayato  staff   64 10  9 03:31 other

$ cd color
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color
$ ls
coolColors	warmColors
$ cd warmColors
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/warmColors
$ ls
orange.txt	red.txt

$ cat red.txt // ← `cat`コマンドは、テキストファイルの中身を見ることができる。
赤色のファイルです。
```

### `cd`に慣れる。

今`warmColors`ディレクトリにいるので、ここから`color/coolColors`に移動して`blue.txt`を見てみる。

- `..`でひとつ上の階層に移動。

```bash
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/warmColors

$ cd ..
$ ls
coolColors	warmColors

$ cd coolColors
$ ls
blue.txt

$ cat blue.txt
あおいろでーた

// ２個上の階層に`cd`する
$ cd ../../
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand

// もう一度coolcolorsディレクトリに移動する。
cd c // ←ここまで書いたら、Tabキーを押す。

$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/coolColors // coolColorsまで来る。
```

### `mkdir`, `touch`コマンドに慣れる。

colorディレクトリに新しく`rainbow`ディレクトリと、`rainbow.txt`を作成する。

```bash
// colorディレクトリまで移動する。
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/coolColors

$ cd ..
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color

$ mkdir rainbow
$ ls -l
total 0
drwxr-xr-x  3 fukushimahayato  staff   96 10  9 03:16 coolColors
drwxr-xr-x  2 fukushimahayato  staff   64 10  9 04:26 rainbow
drwxr-xr-x  4 fukushimahayato  staff  128 10  9 03:36 warmColors // ←追加されている

$ cd rainbow // ※　cd rくらいまで書いたらtabキーを押す。
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/rainbow
$ touch rainbow.txt
$ ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:28 rainbow.txt
```

### `cp`コマンドに慣れる。

`rainbow.txt`をコピーして`rainbowCopy.txt`を作ってみる。

```bash
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/rainbow
$ cp rainbow.txt rainbowCopy.txt // ← cp コピーしたいもの　コピーする名前
fukushimahayato@mbp-2 rainbow % ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:28 rainbow.txt
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:30 rainbowCopy.txt

// もう一度すると、上書きされる。
$ cp rainbow.txt rainbowCopy.txt
$ cp rainbow.txt rainbowCopy.txt
$ ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:28 rainbow.txt
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:32 rainbowCopy.txt

// `-i` コマンドをつけると、確認が入る。
cp -i rainbow.txt rainbowCopy.txt
overwrite rainbowCopy.txt? (y/n [n]) y // ←Enter押すとno, yesの場合はy記入してEnterする。
```

### `mv`コマンドに慣れる。

移動するコマンドは`mv`です。`cp`に似ています。

`rainbow`ディレクトリにある`rainbowCopy.txt`を、`other`ディレクトリに移動してみる。
```bash
$ pwd
/Users/fukushimahayato/Desktop/UnixCommand/color/rainbow

// ファイルを確認
$ ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:28 rainbow.txt
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:34 rainbowCopy.txt

$ mv rainbowCopy.txt ../../other 

// ディレクトリの中身を確認
$ ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:28 rainbow.txt

$ cd ../../other

// ファイルが移動していることを確認
$ ls -l
total 0
-rw-r--r--  1 fukushimahayato  staff  0 10  9 04:34 rainbowCopy.txt
```

## 途中で強制終了するには。

コマンドをいじっていると、途中で止まってしまったり、
めちゃくちゃ時間がかかりそうなので途中で止めたい場合があります。
その場合は、`Ctrl + c`です。

```bash 
// どのディレクトリでもいいので、下記をコピペしてそのままエンター
$ ping google.com
PING google.com (172.217.31.142): 56 data bytes
64 bytes from 172.217.31.142: icmp_seq=0 ttl=116 time=7.914 ms
64 bytes from 172.217.31.142: icmp_seq=1 ttl=116 time=9.543 ms
64 bytes from 172.217.31.142: icmp_seq=2 ttl=116 time=8.312 ms
64 bytes from 172.217.31.142: icmp_seq=3 ttl=116 time=7.757 ms

// 以下、ずっと続く
// 適当なところで、`Ctrl + c`
^C // ←Macでは、これが表示されたら強制終了されたの合図。
--- google.com ping statistics ---
86 packets transmitted, 86 packets received, 0.0% packet loss
round-trip min/avg/max/stddev = 7.076/8.505/11.971/0.852 ms
fukushimahayato@mbp-2 other %
```

## 実際にLaravelの場合のコマンドを見てみましょう。

https://hackmd.io/ZGffowSyRNK6xFp9c6rL1A
