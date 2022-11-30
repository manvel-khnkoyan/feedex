# Catalog Feed Protocol

#### Definitions

**Package** - single unit (e.g. Release, Track), and may be contain other units
**Feed** - A set of packages that is updated within a single process


#### Storage and File Formats

Feeds and Packages are stored in simple file system structures using folders and files.
Each feed and package should be structured according to the date they were created.


#### Files structures

File names should be lowercase only and the file hierarchy should be as shown below:

```
YEAR 
...... / MONTH 
.............. / DAY 
... Feed ........... / unix_timestamp (with milliseconds)
............................................ / manifest.xml
............................................ / packages
......................................................... / 01
.... Package .................................................. / 02
..................................................................... / package.xml
..................................................................... / timestamp.success.log
..................................................................... / timestamp.error.log
```


An example of two different feeds with the same date:

```
           # Feed 1
Feeds/2022/10/11/1666271452953/manifest.xml
Feeds/2022/10/11/1666271452953/packages/01/package.xml  --> Package 1
Feeds/2022/10/11/1666271452953/packages/02/package.xml  --> Package 2

           # Feed 2
Feeds/2022/10/11/1666271964620/manifest.xml
Feeds/2022/10/11/1666271964620/package.xml   -> Package 3
```

#### Feeds Stack

/Feeds
    /2022/...
/Stack
    /1666271452953.xml
    /1666271452953.xml

Once the feed has been created, a Schema must be added to the Stack to start the process.

```xml
<xml>
    <Version>1.0</Version>
    <Client>SonyMusicParser</Client>
    <Feed path="/2022/10/11/1666271452953" />
</xml>
```

#### XML standard

XML Tags are Pascal cases and attributes are cammle cases:

```xml
<MyTag someKey=""></MyTag>
```


#### manifset.xml

Each Feed must have a manifest.xml file with the following example. Where should include **\<Client /\>** and **\<Packages /\>** tags

```xml
<xml>
    <Client>SonyMusicParser</Client>
    <Packages path="packages/*/*/package.xml" />
</xml>
```

The Packages tag must have a **path** attribute that indicates where are packages in the feeds.


## Package Models


Any package file must begin with \<Package /\> tag:

```xml
<xml>
    <Schema>
        ... Schema are here
    </Schema>
</xml>
```

And the package should only have one object inside, for example:

```xml
<xml>
    <Schema>
        <Artist action="Create"> 
            ... content
        </Artist>
    </Schema>
</xml>
```

#### Actions

There are two type of actions: **Primray** and **Secondary**

> Primary types are: **Create**, **Delete**, **Upsert**, **Update**, and should only be declared on the first object,
> Secondary types are **Increase**, **Decrease**, **Push**, **Pull** and should be declared only under **Update** primray type;
> And there is also hidden type: **View** which is accepted by default.

Except for **Update**, **Delete** and **Pull** in all actions - schema requires all fields to be completed

**Rule of Update**

Under **Update** can't be any other **Update** or **Delete**


#### Territory Schema

```xml
<xml>
    <Schema>
        <Territory>
            <Country>US</Country>
            <Validities>
                <Validity>
                    <Name>StreamingValidity</Name>
                    <Type>Allow</Type>
                    <StartDate type="unixtime">1191297600</StartDate>
                </Validity>
                <Validity>
                    <Name>FreezeMechanism</Name>
                    <Type>Allow</Type>
                    <EndDate type="ISO-2023A12">2022-10-30T11:12:00:0400</EndDate>
                </Validity>
            </Validities>
        </Territory>
    <Schema>
</xml>
```

#### Genre

```xml
<xml>
    <Schema>
        <Genres>
            <Genre action="pull">
                <ID>latin</ID>
                <Name>Latin</Name>
                <Source>Apple</Source>
            </Genre>
            <Genre>
                <ID>hip-hop</ID>
                <Name>Hip/Hop</Name>
            </Genre>
        </Genres>
    <Schema>
</xml>
```

#### Artist

```xml
<xml>
    <Schema version="1.0" action="create">
        <Artist>
            <ID>142111</ID>
            <UniqueName>adele [x]</UniqueName>
            <Name>Adele</Name>
            <Genres>
                <Genre src="genres/hiphop.xml" />
                <Genre src="genres/rock.xml" />
            </Genres>
            <Popularity>0.2</Popuylarity>
            <Territories src="territories.xml" />
            <Images>
                <Image>
                    <Resource />
                    <Provider>7digital</Provider>
                    <Value>https://artwork-cdn....eart/00/000/007/0000000749_<$size$>.jpg</Value>
                    <Resolution>
                        <Width>800</Width>
                        <Heigth>800</Heigth>
                    </Resolution>
                </Image>
                <Image>
                    <Resource mimeType="image/*" type="FilePath">
                        /tmp/artists/default.jpeg
                    </Resource>
                    <Provider>LocalStorage</Provider>
                    <Resolution>
                        <Width>800</Width>
                        <Heigth>800</Heigth>
                    </Resolution>
                    <Value>13012099250749</Value>
                </Image>
                <Image>
                    <Resource mimeType="image/*" type="HttpURL">
                        https://artwork-cdneart.com/00/000/007/0000000749_.jpg
                    </Resource>
                    <Provider>LocalStorage</Provider>
                    <Resolution>
                        <Width>800</Width>
                        <Heigth>800</Heigth>
                    </Resolution>
                    <Value>13012099250749</Value>
                </Image>
            </Images>
            <MetaData>
                <BirthDay type="ISO-YMD">1980-03-22</BirthDay>
            </MetaData>
            <Resources action="push">
                <Resource>
                    <Source>7digital</Source>
                    <Item>
                        <Type>Web-Link</Type>
                        <Value>https://itunes.apple.com...60760626?uo=4&at=1010lo7f&app=itunes</Value>
                    <Item>
                </Resource>
            </Resources>
            <CreatedAt type="unixtimestamp">1614859461<createdAt>
            <UpdatedCount action="increase">1</Popuylarity>
        </Artist>
    <Schema>
</xml>
```

#### Release

```xml
<xml>
    <Schema action="Create">
        <Release id="1234">
            <Title>243676578</Title>
            <TrackCount>14</TrackCount>
            <SubTitle>14</SubTitle>
            <Popularity>0.2</Popuylarity>
            <CLine>Â© 2003 EMI Records Ltd</CLine>
            <PLine></PLine>
            <DiscNumber>1</DiscNumber>
            <Duration type="seconds">226</Duration>
            <ExplicitType>implicit</ExplicitType>
            <GRID></GRID>
            <ISPN>U4099991E90120</ISPN>
            <ISRC>USEWC0761141</ISRC>
            <ProductNumber>00724358220254</ProductNumber>
            <ReleaseDate type="ISO-YMD">1992-01-01</ReleaseDate>
            <Territories src="territories.xml" />
            <Reference>
                <Provider>7digital</Provider>
                <ID>2509822</ID>
            </Reference>
            <Label>
                <ID>12652</ID>
                <Name>EMI Trade Marketing</Name>
            </Label>
            <Images>
                <Image>
                    <Source>7digital</Source>
                    <Resolutions>
                        <Width>800</Width>
                        <Heigth>800</Heigth>
                    </Resolutions>
                    <Value>https://artwork-cdn....eart/00/000/007/0000000749_<$size$>.jpg</Value>
                </Image>
            </Images>
            <Resources>
                <Resource>
                    <Source>7digital</Source>
                    <Type>Web-Link</Type>
                    <Value>https://itunes.apple.com...60760626?uo=4&at=1010lo7f&app=itunes</Value>
                </Resource>
            </Resources>
            <Genres>
                <Genre src="genres/hiphop.xml" />
                <Genre src="genres/rock.xml" />
            </Genres>
            <Artists>
                <Artist src="artists/152003.xml"/>
                <Artist src="artists/45092.xml"/>
            </Artists>
            <Tracks>
                <Track src="tracks/3458902.xml" />
                <Track src="tracks/3458903.xml" />
                <Track src="tracks/3458904.xml" />
            <Tracks>
            <CreatedAt type="unixtimestamp">1614859461<createdAt>
        <Release>
    <Schema>
</xml>
```

#### Track

```xml
<xml>
    <Schema action="Create">
        <Track id="4a49466d-674a-452c-96b7-b0b4e277edfa">
            <Title>243676578</Title>
            <SubTitle>14</SubTitle>
            <CLine>Â© 2003 EMI Records Ltd</CLine>
            <PLine>Â© 2003 EMI Records Ltd</PLine>
            <DiscNumber>3</DiscNumber>
            <TrackNumber>2</TrackNumber>
            <Duration type="seconds">226</Duration>
            <ExplicitType>implicit</ExplicitType>
            <GRID></GRID>
            <ISPN>U4099991E90120</ISPN>
            <ISRC>USEWC0761141</ISRC>
            <Releases>
                <Release src="release.1.xml">
                <Release src="release.2.xml">
            </Releases>
            <Reference>
                <Provider>7digital</Provider>
                <ID>2509822</ID>
            </Reference>
            <Resources>
                <Resource>
                    <Source>7digital</Source>
                    <Type>Web-Link</Type>
                    <Value>https://itunes.apple.com/...?uo=4&at=1010lo7f&app=itunes</Value>
                </Resource>
            </Resources>
            <Validities>
                <Validity />
                <Validity />
            </Validities>
            <Genres>
                <Genre action="push" src="genres/hiphop.xml" />
                <Genre action="push" src="genres/rock.xml" />
            </Genres>
            <Artists>
                <Artist src="artists/152003.xml"/>
                <Artist src="artists/45092.xml"/>
            </Artists>
            <CreatedAt type="unixtimestamp">1614859461<createdAt>
        <Track>
    <Schema>
</xml>
```


### Actions: Create / Update / Delete

The same architecture can be used to create, update and delete, by using **action** attribute in each model.
If there is no **action** attribute in the model, no action will be taken, it will simply return the model

For example, how to remove a release (note that updates and releases require an ID):

```xml
<xml>
    <Schema>
        <Release action="Delete">
            <ID>243676578<ID>
        <Release>
    <Schema>
</xml>
```

This is how to make update operation:


```xml
<xml>
    <Schema>
        <Release>
            <ID>Hello</ID>
            <Title>Hello</Title>
            <View>1</View>
            <Artists>
                <Artist action="push" src="genres/artist.2.xml"/>
                <Artist action="pull" src="genres/artist.2.xml"/>
            </Artists>
            <Tracks>
                <Track action="pull" src="tracks/track1" />
            <Tracks>
        <Release>
    </Schema>
</xml>
```

And this example how to push or pull an object into a list:

```xml
<xml>
    <Schema version="1.0">
        <Track action="Update">
            <ID>123445</ID>
            <Territories>
                <Territory action="push" src="territories.xml" ref="US" />
            </Territories>
            <Resources action="Update">
                <Resource action="Pull">
                </Resource>
                <Resource action="Push">
                </Resource>
            </Resources>
        <Track>
    </Schema>
</xml>
```

```xml
<xml>
    <Schema version="1.0">
        <Release action="Update">
            <ID>12301928</ID>
            <UpdateCount operator="Increase">3</UpdateCount>
            <Resources operator="Transform">
                <Resource action="Pull">
                </Resource>
                <Resource action="Push">
                </Resource>
            </Resources>
        </Release>
    </Schema>
</xml>
```

```xml
<xml>
    <Schema version="1.0">
        <ReleaseSetting action="Update">
            <ID>12301928</ID>
            <Territories operator="Placement">
                <Country operator="Pull">US</Country>
            </Territories>
        </ReleaseSetting>
    </Schema>
</xml>
```

```xml
<xml>
    <Schema version="1.0">
        <Track action="Delete">
            <ID>12301928</ID>
        <Track>
    </Schema>
</xml>
```

