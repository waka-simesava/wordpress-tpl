=== Imsanity ===
Contributors: nosilver4u,verysimple
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MKMQKCBFFG3WW
Tags: image, scale, resize, space saver, quality
Requires at least: 4.5
Tested up to: 5.2
Requires PHP: 5.6
Stable tag: 2.4.2
License: GPLv3

Imsanityは自動的に大量の画像アップロードのサイズを変更します。投稿者は巨大な写真をアップロードしていますか？手動でスケーリングするのはうんざり？救済へのImsanity！

== 説明 ==

"Imsanity"は自動的に巨大な画像のアップロードを以下のサイズにサイズ変更します。
ブラウザでの表示には合理的ですが、それでも通常のWebサイトでの使用には十分な大きさです。
プラグインは最大幅、高さと品質で設定可能です。
投稿者が設定されたサイズより大きい画像は、「Imsanity」に自動的に縮小されます。
サイズを設定し、元の画像を置き換えます。

「Imsanity」は、以前にアップロードされたイメージを選択的にサイズ変更してディスク容量を解放するための一括サイズ変更機能も提供します。

このプラグインは、高解像度のオリジナル画像を必要としないブログに最適です。
アップロードする前に画像を拡大縮小することを望まない（または方法を理解している）ことを寄稿者が望まない（または理解していない）場合があります。

= 特徴 =

* 大きな画像のアップロードを自動的に「より適切な」サイズに調整します。
* 既存の画像を選択的にサイズ変更するための一括サイズ変更機能
* 最大幅/高さとjpg品質の設定が可能
* オプションで画像を拡大縮小できるようにBMPファイルをJPGに変換
* Imsanity は一度有効にすると、ユーザー側の操作を必要としません。
* WordPress内蔵の画像拡大縮小機能を使用します

= 翻訳 =

Imsanity はいくつかの言語で利用可能で、それぞれのプラグインをインストールすると自動的にダウンロードされます。それをあなたの言語に翻訳するのを助けるために、 https://translate.wordpress.org/projects/wp-plugins/imsanity にアクセスしてください。

= 寄付 =

Imsanity は https://github.com/nosilver4u/imsanity で開発されています（プルリクエストは大歓迎です）。

== インストール ==

自動インストール

1. [管理画面] -> [プラグイン] -> [新規追加] の順に進み、 "imsanity" を検索します
2. [インストール] ボタンをクリックします
3. [有効にする]をクリックします

手動インストール

1. imsanity.zipをダウンロードします
2. 「imsanity」フォルダを解凍し、「/wp-content/plugins/」ディレクトリにアップロードします
3. WordPressの[プラグイン]メニューからプラグインを有効にします

== スクリーンショット ==

1. 最大の高さ/幅を設定するための "Imsanity"設定ページ
2. "Imsanity"一括画像サイズ変更機能

== よくある質問 ==

= Imsanity とは何ですか？ =

Imsanity は設定された最大幅/高さより大きいアップロードされた画像を自動的にリサイズするプラグインです

= Imsanity プラグインをインストールするとブログ内の既存の画像が変更されますか？ =

Imsanity を有効にしても、既存の画像は変更されません。
Imsanity はアップロードされた画像のサイズを変更します。
特に[一括画像サイズ変更]機能を使用しない限り、既存の画像には影響しません。
Imsanity 設定ページの [一括画像サイズ変更] 機能を使用すると、既存の画像を選択的にサイズ変更できます。

= 一括サイズ変更機能を使用しようとすると、すべての画像が検出されないのはなぜですか？ =

Imsanity はファイルシステムを検索して大きなファイルを見つけるのではなく、WordPressメディアライブラリデータベースの「メタデータ」を調べます。
この動作を無効にするには、ディープスキャンを有効にします。

= 「ファイルは画像ではありません」というエラーが表示されるのはなぜですか？ =

WordPressはGDライブラリを使用して画像操作を処理します。 GDは、さまざまな種類の画像をサポートするようにインストールおよび構成できます。 GDが特定の画像タイプを処理するように設定されていない場合は、アップロードしようとするとこのメッセージが表示されます。
詳細については http://php.net/manual/en/image.installation.php を参照してください。

= サイズを変更せずにアップロードできるように、特定の画像を無視するように「Imsanity」に指示するにはどうすればよいですか？ =

ファイル名を変更して、ファイル名に "-noresize"を追加することができます。たとえば、ファイルの名前が "photo.jpg"の場合は、 "photo-noresize.jpg"という名前に変更できますが、 "Imsanity"は無視され、フルサイズの画像をアップロードできます。

必要に応じて、一時的に最大画像サイズ設定を調整し、アップロードしたい画像の解像度より高い数値に設定することができます。

= なぜこのプラグインが必要なのですか？ =

最近のカメラやほとんどの携帯電話で撮った写真は、ブラウザではフルサイズで表示するには大きすぎます。
最新のデジタル一眼レフカメラの場合、画像サイズは高品質の印刷を目的としており、Webページに表示するために途方もなく大きすぎるサイズになっています。

Imsanity を使用すると、アップロードされたすべての画像が、一般的なWebサイトのニーズを満たすのに十分な大きさを超える妥当なサイズに制限されるように、妥当性の制限を設定できます。
Imsanity は、画像のアップロード直後、WordPressの処理が行われる前に、WordPressに接続します。そのため、WordPressは、アップロード前に投稿者が自分の画像を適切なサイズに拡大したかのようになる点を除いて、まったく同じように動作します。

Imsanity が使用するサイズ制限は設定可能です。 デフォルト値はスケーリングせずに画面全体の平均値を埋めるのに十分な大きさなので、通常の使用にはまだ十分な大きさです。

= なぜこのプラグインを使いたくないのですか？ =

WordPressをストックアートのダウンロードサイトとして使用する場合、高解像度の画像を印刷用に提供する場合、またはWordPressを高解像度の写真保管アーカイブとして使用する場合は、 "Imsanity"を使用したくない場合があります。あなたがこれらのことのうちのどれかをしているならば、おそらくあなたはすでに画像解像度についての十分な理解を持っています。

= WordPressはすでに画像を自動的に拡大縮小しませんか？ =

画像がアップロードされると、WordPressはオリジナルを保持し、オリジナルのサイズに応じて、ページに埋め込むことを目的としたファイルの最大4つの小さいサイズのコピー（大、中、大、中、サムネイル）を作成します。特別な写真の必要がない限り、オリジナルは通常未使用のままそこにありますが、ディスククォータを占めます。

= なぜあなたは「Insanity」を間違って綴ったのですか？  =

「Imsanity」は「Image Sanity Limit（画像の妥当性制限）」の略です。
「Sanity Limit（妥当性制限）」とは、合理的なサイズまたは値に何かを制限するための用語です。

= どこでサポートを受けますか？ =

質問はサポートフォーラム https://wordpress.org/support/plugin/imsanity に投稿されるかもしれませんが、答えが得られない場合は https://ewww.io/contact-us/ を利用してください。

== 変更履歴 ==

= 2.4.2 =
* changed: noresize in filename also works in batch processing
* fixed: error message does not contain filename when file is missing
* fixed: notice on network settings when deep scan option has not been set before

= 2.4.1 =
* fixed: bulk resizer scan returning incorrect results
* fixed: sprintf error during resizing and upload

= 2.4.0 =
* added: deep scanning option for when attachment metadata isn't updating properly
* fixed: uploads from Gutenberg not detected properly
* fixed: some other plugin(s) trying to muck with the Imsanity settings links and breaking things
* fixed: undefined notice for query during ajax operation
* fixed: stale metadata could prevent further resizing

= Earlier versions =
Please refer to the separate changelog.txt file.
