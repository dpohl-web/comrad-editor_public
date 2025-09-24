<?php
$jsonstring = <<< EOF
{
  "config": {
    "language": {
      "default": "                en            ",
      "languages": [
        {
          "short": "                    en                ",
          "long": "                    english                "
        },
        {
          "short": "                    de                ",
          "long": "                    german                "
        }
      ]
    },
    "graphs": {
      "comment": [
        {},
        {}
      ],
      "default": "                ownbar            ",
      "showGraphSwitch": "                0            ",
      "graphSwitchOptions": {
        "comment": {},
        "options": [
          "                    radar                ",
          "                    doughnut                ",
          "                    polar                ",
          "                    ownbar                ",
          "                    bar                "
        ]
      }
    },
    "comment": {},
    "showHeaderButton": "            1        "
  },
  "head": {
    "title": {
      "de": "                Qualität & QM            ",
      "en": "                REST questionnaire            "
    },
    "meta": {
      "@attributes": {
        "type": "survey",
        "type2": "survey2",
        "type3": "survey3"
      }
    },
    "language": {
      "@attributes": {
        "fallback": "de_DE"
      }
    },
    "button": {
      "text": {
        "de": "                    Zu REVEAL                ",
        "en": "                    To REVEAL                "
      },
      "link": "                https://reveal-eu.org/            "
    }
  },
  "comment": [
    {},
    {},
    {},
    {},
    {},
    {}
  ],
  "cat": [
    {
      "evaluate": "            0        ",
      "catname": {
        "de": "                Allgemeine Angaben            ",
        "en": "                General Information            "
      },
      "page": {
        "evaluate": "                0            ",
        "informations": {
          "@attributes": {
            "position_to_catname": "before"
          },
          "subtitle": {
            "de": "                        Selbsteinschätzung zum Thema Qualitätsmanagement in Bildungseinrichtung                    ",
            "en": "                        Comptence Profile on Entrepreneurship                    "
          },
          "description": {
            "de": "                        Wie schätzen Sie Ihre Kompetenzen in Bezug auf die einzelnen Modulthemen ein?                                                <br>                        Bitte kreuzen Sie die für Sie am ehesten passende Antwort auf die folgenden 5 Fragenblöcke an.                    ",
            "en": "<br>Comptence Profile on Entrepreneurship<hr>"
          }
        },
        "comment": [
          {},
          {}
        ],
        "block": [
          {
            "@attributes": {
              "type": "input"
            },
            "question": {
              "de": "                        Name                    ",
              "en": "                        Name                    "
            }
          },
          {
            "@attributes": {
              "type": "input"
            },
            "question": {
              "de": "                        Beruf, Studienzweig, Spezialisierung                    ",
              "en": "                        Name of organisation                    "
            }
          }
        ]
      }
    },
    {
      "evaluate": "            1        ",
      "catname": {
        "de": "                Qualität und QM            ",
        "en": "                Competences on Recruitment of refugees            "
      },
      "catcolor": {
        "red": "179",
        "green": "129",
        "blue": "135"
      },
      "page": {
        "evaluate": "                1            ",
        "block": [
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualität Allgemein                    ",
              "en": "                        Searching                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich kann den Begriff der Qualität mit meinen eigenen Worten erklären.                        ",
                  "en": "                        I am aware that the searching process of refugees is a challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich habe in meinen privaten und professionellen Tätigkeitsbereichen für eine qualitative Verbesserungen gesorgt.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the searching process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kann Qualitätsfaktoren in meiner Einrichtung einschätzen und diskutieren.                         ",
                  "en": "                        I am able to take on board singular searching activities in my own (selected) campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen umzusetzen.                         ",
                  "en": "                        I have been creating and executing searching approaches for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen strategisch einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          },
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualitätsmanagement                    ",
              "en": "                        Screening (instruments etc.)                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich habe eine rudimentäre Vorstellung über QualitätsMANAGEMENT.                        ",
                  "en": "                        I am aware that the screening process of refugees is a specific challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich kenne die Grundlagen des QM und habe diese bereits angewendet.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the screening process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kenne alle  zentralen Elemente eines QM-Systems und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                        ",
                  "en": "                        I am able to take on board singular specific screening instruments in my own campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen systematisch einzuführen.                        ",
                  "en": "                        I have been creating and executing a toolbox for screening instruments for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage ein QM in einer Einrichtung einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          }
        ]
      }
    },
    {
      "evaluate": "            1        ",
      "catname": {
        "de": "                QM in der Bildung            ",
        "en": "                Induction and onboarding skills and competences            "
      },
      "catcolor": {
        "red": "185",
        "green": "155",
        "blue": "157"
      },
      "page": [
        {
          "evaluate": "                1            ",
          "block": [
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        Anforderungen an das QM in verschiedenen Bildungsbereichen                    ",
                "en": "                        Inclusive company cultures                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich kann qualitätsrelevante Bereiche in verschiedenen Bildungssektoren benennen.                        ",
                    "en": "                        I am aware that different companies have different integration cultures                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kann grob unterschiedliche Qualitäts-Anforderungen in einigen Bildungssektoren erklären.                        ",
                    "en": "                        I am aware of advantages of an inclusive enterprise culture.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne detailliert die wesentlichen Anforderungen und Strukturen in einigen Bildungssektoren in Bezug auf Qualität und QM.                        ",
                    "en": "                        I know the main “ingredients” of a positive inclusive enterprise culture.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, die Anforderungen aus den Bildungssektoren im Hinblick auf unterschiedliche QM-Systeme zu analysieren.                        ",
                    "en": "                        I’m able to implement singular actions for that support an inclusive enterprise culture.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement an inclusive enterprise culture in my organisation (and in others).                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            },
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        QM in verschiedenen Bildungssektoren                    ",
                "en": "                        Crosscultural management                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich habe von speziellen Qualitätsmanagementsystemen für den Bildungsbereich gehört.                        ",
                    "en": "                        I have a notion what crosscultural management means.                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne einige unterschiedliche QM-Systeme im Bildungsbereich und kann diese grob unterscheiden.                         ",
                    "en": "                        I am aware of the purpose and advantages of crosscultural management.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne zentrale Elemente verschiedener QM-Systeme im Bildungsbereich und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                         ",
                    "en": "                        I can explain the concept and the main elements of crosscultural management.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, mehrere QM-Systeme im Hinblick auf Ihre Passung in bestimmten Bildungseinrichtungen und -sektoren zu analysieren.                         ",
                    "en": "                        I’m able to implement singular actions for a crosscultural management in a given case.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement crosscultural management in my organisation (and in others).                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            },
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        QM in verschiedenen Bildungssektoren                    ",
                "en": "                        Onboarding techniques                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich habe von speziellen Qualitätsmanagementsystemen für den Bildungsbereich gehört.                        ",
                    "en": "                        I know that integrating refugees need specific onboarding techniques.                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne einige unterschiedliche QM-Systeme im Bildungsbereich und kann diese grob unterscheiden.                         ",
                    "en": "                        I can tell reasons of specific onboarding techniques for refugees in organisations and enterprises.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne zentrale Elemente verschiedener QM-Systeme im Bildungsbereich und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                         ",
                    "en": "                        I can explain different onboarding elements and techniques in regard to different target groups.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, mehrere QM-Systeme im Hinblick auf Ihre Passung in bestimmten Bildungseinrichtungen und -sektoren zu analysieren.                         ",
                    "en": "                        I’m able to implement singular onboarding techniques in specific cases.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement a strategic system for onboarding refugees and migrants in organisations and enterprises.                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            }
          ]
        },
        {
          "evaluate": "                1            ",
          "block": [
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        Anforderungen an das QM in verschiedenen Bildungsbereichen                    ",
                "en": "                        Inclusive company cultures                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich kann qualitätsrelevante Bereiche in verschiedenen Bildungssektoren benennen.                        ",
                    "en": "                        I am aware that different companies have different integration cultures                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kann grob unterschiedliche Qualitäts-Anforderungen in einigen Bildungssektoren erklären.                        ",
                    "en": "                        I am aware of advantages of an inclusive enterprise culture.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne detailliert die wesentlichen Anforderungen und Strukturen in einigen Bildungssektoren in Bezug auf Qualität und QM.                        ",
                    "en": "                        I know the main “ingredients” of a positive inclusive enterprise culture.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, die Anforderungen aus den Bildungssektoren im Hinblick auf unterschiedliche QM-Systeme zu analysieren.                        ",
                    "en": "                        I’m able to implement singular actions for that support an inclusive enterprise culture.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement an inclusive enterprise culture in my organisation (and in others).                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            },
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        QM in verschiedenen Bildungssektoren                    ",
                "en": "                        Crosscultural management                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich habe von speziellen Qualitätsmanagementsystemen für den Bildungsbereich gehört.                        ",
                    "en": "                        I have a notion what crosscultural management means.                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne einige unterschiedliche QM-Systeme im Bildungsbereich und kann diese grob unterscheiden.                         ",
                    "en": "                        I am aware of the purpose and advantages of crosscultural management.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne zentrale Elemente verschiedener QM-Systeme im Bildungsbereich und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                         ",
                    "en": "                        I can explain the concept and the main elements of crosscultural management.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, mehrere QM-Systeme im Hinblick auf Ihre Passung in bestimmten Bildungseinrichtungen und -sektoren zu analysieren.                         ",
                    "en": "                        I’m able to implement singular actions for a crosscultural management in a given case.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement crosscultural management in my organisation (and in others).                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            },
            {
              "@attributes": {
                "type": "radio"
              },
              "question": {
                "de": "                        QM in verschiedenen Bildungssektoren                    ",
                "en": "                        Onboarding techniques                    "
              },
              "answers": [
                {
                  "answer": {
                    "de": "                        Ich habe von speziellen Qualitätsmanagementsystemen für den Bildungsbereich gehört.                        ",
                    "en": "                        I know that integrating refugees need specific onboarding techniques.                        "
                  },
                  "value": "1"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne einige unterschiedliche QM-Systeme im Bildungsbereich und kann diese grob unterscheiden.                         ",
                    "en": "                        I can tell reasons of specific onboarding techniques for refugees in organisations and enterprises.                        "
                  },
                  "value": "2"
                },
                {
                  "answer": {
                    "de": "                        Ich kenne zentrale Elemente verschiedener QM-Systeme im Bildungsbereich und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                         ",
                    "en": "                        I can explain different onboarding elements and techniques in regard to different target groups.                        "
                  },
                  "value": "3"
                },
                {
                  "answer": {
                    "de": "                        Ich bin in der Lage, mehrere QM-Systeme im Hinblick auf Ihre Passung in bestimmten Bildungseinrichtungen und -sektoren zu analysieren.                         ",
                    "en": "                        I’m able to implement singular onboarding techniques in specific cases.                        "
                  },
                  "value": "4"
                },
                {
                  "answer": {
                    "de": "                        Ich kann passende QM-Systeme in einer Bildungseinrichtung in der Praxis zu planen und einzuführen.                        ",
                    "en": "                        I am able to develop and implement a strategic system for onboarding refugees and migrants in organisations and enterprises.                        "
                  },
                  "value": "5"
                }
              ],
              "weight": "                    1                "
            }
          ]
        }
      ]
    },
    {
      "evaluate": "            1        ",
      "catname": {
        "de": "                Qualität und QM            ",
        "en": "                Competences on Recruitment of refugees            "
      },
      "catcolor": {
        "red": "179",
        "green": "129",
        "blue": "135"
      },
      "page": {
        "evaluate": "                1            ",
        "block": [
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualität Allgemein                    ",
              "en": "                        Searching                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich kann den Begriff der Qualität mit meinen eigenen Worten erklären.                        ",
                  "en": "                        I am aware that the searching process of refugees is a challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich habe in meinen privaten und professionellen Tätigkeitsbereichen für eine qualitative Verbesserungen gesorgt.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the searching process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kann Qualitätsfaktoren in meiner Einrichtung einschätzen und diskutieren.                         ",
                  "en": "                        I am able to take on board singular searching activities in my own (selected) campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen umzusetzen.                         ",
                  "en": "                        I have been creating and executing searching approaches for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen strategisch einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          },
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualitätsmanagement                    ",
              "en": "                        Screening (instruments etc.)                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich habe eine rudimentäre Vorstellung über QualitätsMANAGEMENT.                        ",
                  "en": "                        I am aware that the screening process of refugees is a specific challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich kenne die Grundlagen des QM und habe diese bereits angewendet.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the screening process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kenne alle  zentralen Elemente eines QM-Systems und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                        ",
                  "en": "                        I am able to take on board singular specific screening instruments in my own campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen systematisch einzuführen.                        ",
                  "en": "                        I have been creating and executing a toolbox for screening instruments for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage ein QM in einer Einrichtung einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          }
        ]
      }
    },
    {
      "evaluate": "            1        ",
      "catname": {
        "de": "                Qualität und QM            ",
        "en": "                Competences on Recruitment of refugees            "
      },
      "catcolor": {
        "red": "179",
        "green": "129",
        "blue": "135"
      },
      "page": {
        "evaluate": "                1            ",
        "block": [
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualität Allgemein                    ",
              "en": "                        Searching                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich kann den Begriff der Qualität mit meinen eigenen Worten erklären.                        ",
                  "en": "                        I am aware that the searching process of refugees is a challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich habe in meinen privaten und professionellen Tätigkeitsbereichen für eine qualitative Verbesserungen gesorgt.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the searching process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kann Qualitätsfaktoren in meiner Einrichtung einschätzen und diskutieren.                         ",
                  "en": "                        I am able to take on board singular searching activities in my own (selected) campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen umzusetzen.                         ",
                  "en": "                        I have been creating and executing searching approaches for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen strategisch einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          },
          {
            "@attributes": {
              "type": "radio"
            },
            "question": {
              "de": "                        Qualitätsmanagement                    ",
              "en": "                        Screening (instruments etc.)                    "
            },
            "answers": [
              {
                "answer": {
                  "de": "                        Ich habe eine rudimentäre Vorstellung über QualitätsMANAGEMENT.                        ",
                  "en": "                        I am aware that the screening process of refugees is a specific challenge.                        "
                },
                "value": "1"
              },
              {
                "answer": {
                  "de": "                        Ich kenne die Grundlagen des QM und habe diese bereits angewendet.                        ",
                  "en": "                        I understand the basic reasons for the challenges in the screening process of refugees.                        "
                },
                "value": "2"
              },
              {
                "answer": {
                  "de": "                        Ich kenne alle  zentralen Elemente eines QM-Systems und kann diese (im Groben) erklären bzw. aktiv (mit)diskutieren.                        ",
                  "en": "                        I am able to take on board singular specific screening instruments in my own campaigns.                        "
                },
                "value": "3"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage, qualitätsverbessernde Maßnahmen systematisch einzuführen.                        ",
                  "en": "                        I have been creating and executing a toolbox for screening instruments for refugees for my professional domain.                        "
                },
                "value": "4"
              },
              {
                "answer": {
                  "de": "                        Ich bin in der Lage ein QM in einer Einrichtung einzuführen.                         ",
                  "en": "                        I am able to strategically integrate the approaches in our company’s searching strategy.                        "
                },
                "value": "5"
              }
            ],
            "weight": "                    1                "
          }
        ]
      }
    }
  ],
  "resultpage": {
    "header": {
      "title": {
        "de": "                    Vielen Dank für’s Ausfüllen.                ",
        "en": "                    Thank you for filling out!                "
      },
      "description": {
        "de": "                    Bitte speichern Sie die PDF zunächst auf Ihrem Computer.                ",
        "en": "                    Please save the PDF on your computer first.                "
      }
    },
    "body": {
      "showtomsstyle": "1",
      "interpretation": [
        {
          "@attributes": {
            "required": "1"
          },
          "description": {
            "de": "                        <p>Wie können wir die Ergebnisse interpretieren?</p><p>Je höher die Punktzahl für eine Kategorie, desto mehr ist diese Kategorie in Ihrem Fall relevant.                            Der konkrete Wert kann aus den Kreisen abgeleitet werden, die sogenannte Perzentile anzeigen.                            Ein Wert nahe 50% bedeutet, dass 50% der vergleichbaren Bevölkerung einen ähnlichen oder niedrigeren Wert haben - was bedeutet, dass Sie mit dem Durchschnitt übereinstimmen.                            Ein Wert nahe 20% bedeutet, dass nur 20% der vergleichbaren Bevölkerung einen ähnlichen oder niedrigeren Wert haben und die restlichen 80% einen höheren Wert haben - in diesem Fall passen Sie zu einem relativ niedrigen Grad zu diesem Typ (dieser Eigenschaften).                            Ein Wert nahe 80% bedeutet, dass 80% der vergleichbaren Bevölkerung einen ähnlichen oder niedrigeren Wert haben und nur 20% einen höheren Wert haben - in diesem Fall passen Sie zu einem relativ hohen Grad zu diesem Typ (dieser Eigenschaften).                        </p>                    ",
            "en": "                        <p>How can we interpret the results?</p><p>The higher the score for a category the more this category is relevant in your case.                            The concrete value can be derived from the circles that display so called percentils.                            A score near to 50% means that 50% of the comparable population have a similar or lower value - which means that you match with the average.                            A score near to 20% means that only 20% of the comparable population have a similar or lower value and the remaining 80% have a higher value - in this case you are matching to a relatively low degree to that type (this characteristics).                            A score near to 80% means that 80% of the comparable population have a similar or lower value and only 20% have a higher value - in this case you are matching to a relatively high degree to that type (this characteristics).                        </p>                    "
          }
        },
        {
          "@attributes": {
            "required": "1"
          },
          "image_categories": [
            {
              "de": "                            Diverger                    ",
              "en": "                            Diverger                    "
            },
            {
              "de": "                            Assimilitor                    ",
              "en": "                            Assimilitor                    "
            },
            {
              "de": "                            Converger                    ",
              "en": "                            Converger                    "
            },
            {
              "de": "                            Accomodator                    ",
              "en": "                            Accomodator                    "
            }
          ],
          "description": {
            "de": "                        <p>                            Wie Sie sehen können, haben die vier Felder den Titel: Diverger, Assimilitor, Converger und Accomodator.                            Dies sind die 4 Hauptlehrpfade nach dem KOLB-Modell.                            Dein Lernstil ist auf Hochtouren, wenn dein Wert weit im jeweiligen Feld liegt.                            Wenn Ihr Wert zu einem benachbarten Feld eng ist, kann dies eine Mischung aus Lernstil genannt werden.                            Wenn Ihr Wert in der Nähe des Zentrums liegt, haben Sie einen ausgewogenen Lernstil mit Elementen aus allen Kategorien.                            Die folgenden Aussagen sind noch nicht durch abgeschlossene Forschungsdaten belegt; Sie basieren auf den Erfahrungen der ersten und zweiten Version von Kolbs \\'Lernstil-Inventar\\'.                            Diverager bevorzugen konkrete Erfahrung und reflektierende Beobachtung. Ihre Stärke ist eine einfallsreiche Fähigkeit. Sie neigen dazu, konkrete Situationen aus verschiedenen Blickwinkeln zu betrachten und interessieren sich für Menschen. Sie haben ein breites kulturelles Interesse und spezialisieren sich oft auf künstlerische Aktivitäten. Dieser Lernstil ist typisch für Geisteswissenschaften und verwandte Berufe.                            Assimilatoren bevorzugen reflektive Beobachtung und abstrakte Konzeptualisierung. Ihre Stärke ist die Generierung theoretischer Modelle. Sie neigen dazu, Schlussfolgerungen zu ziehen und sich lieber mit Dingen und Theorien als mit Personen zu beschäftigen. Sie integrieren einzelne Fakten in Begriffe und Konzepte. Dieser Lernstil ist typisch für Mathematiker und Theoretiker und verwandte Berufe.                            Convergers bevorzugen abstrakte Konzeptualisierung und aktives Experimentieren. Ihre Stärke ist die Ausführung von Ideen. Sie neigen zu hypothetisch-deduktiven Schlussfolgerungen und ziehen es vor, sich mit Dingen und Theorien zu beschäftigen (die sie gerne untersuchen) als mit Personen. Sie haben enge technische Interessen und spezialisieren sich oft auf angewandte Wissenschaften. Dieser Lernstil ist typisch für Ingenieure.                            Accomodatoren bevorzugen aktives Experimentieren und konkrete Erfahrung. Ihre Stärke ist die Anordnung von Aktivitäten. Sie neigen zur intuitiven Problemlösung durch Versuch und Irrtum und beschäftigen sich lieber mit Personen als mit Dingen und Theorien. Sie würden einzelnen Fakten mehr vertrauen als theoretischen Konstrukten und spezialisieren sich oft auf praktisches Handeln. Dieser Lernstil ist typisch für Sales Manager.                        </p>                    ",
            "en": "                        <p>                            As you can see the four fields are entitled: Diverger, Assimilitor, Converger und Accomodator.                            These are the 4 main Learning stiles according to the model of KOLB.                            Your learning stile is in high gear when your value is situated far in the respective field.                            When your value is narrow to a neighbouring field one can name this a mixture type of learning style.                            If your value is near to the center you have a balanced learning style that has elements from all categories.                            The following statements are not yet proven by completed research data; they are grounded on experiences from the first and second version of Kolbs \\'Learning style inventory\\'.                            Divergers prefere concrete experience and reflective observation. Their strenght is an imaginative ability. They have a tendency for regarding concrete situations from various perspectives and they are interested in people. They have a broad cultural interest and often specialize in artistic activities. This learning style is typical for humanities and related professions.                            Assimilators prefere reflective observation and abstract conceptualization. Their strength is the generation of theoretical models. They have a tendency for in-ductive conclusions and prefer to occupy themselves with things and theories rather than with persons. They integrate single facts to terms and concepts. This learning style is typical for mathematicians and theoretical sciences and related professions.                            Convergers prefere abstract conceptualization and active experimentation. Their strength is the execution of ideas. They have a tendency for hypotheical-deductive conclusions and prefer to occupy themselves with things and theories (which they like to examine) than with persons. They have narrow technical interests and often specialize in applied sciences. This learning style is typical for engineers.                            Accomodators prefere active experimentation and concrete experience. Their strenght is the arrangement of activities. They have a tendency for intuitive problem solving by trial-and-error and prefer to occupy themselves with persons rather than things and theories. They would trust single facts more than theoretical constructs and often specialize in practical doing. This learning style is typical for sales managers.                        </p>                    "
          }
        }
      ],
      "comment": {},
      "literature": {
        "@attributes": {
          "required": "1"
        },
        "p": [
          "                    Ferrell, Barbara G.: A Factor Analytic Comparison of Four Learning-Styles Instruments. In: Journal of Educational Psychology, 1983, Heft 1, S. 33-39.                ",
          "                    Fischer, Barbara B. / Fischer, Louis: Styles in Teaching and Learning. In: Educational Leadership, 1979, S. 245-254.                 ",
          "                    Flechsig, Karl-Heinz: Kleines Handbuch didaktischer Modelle, Eichenzell, Neuland - Verlag für lebendiges Lernen, 1996                ",
          "                    Gabriel, Alfred/Haller, Hans-Dieter: Untersuchungen zu Lernstilen von Erwachsenen an Abendgymnasien. In: Festschrift â€ž10 Jahre Abendgymnasium GÃ¶ttingenâ€œ, 4. Juni 1983, S. 11-20.                ",
          "                    Haller, Hans-Dieter: An die Tür des Geistes klopfen. Lernen und ProblemlÃ¶sen. In: ManagerSeminar, 1992, 7, S. 42-49                ",
          "                    Heue, Matthias: Die Erfassung kultureller Wertorientierungen an Hand der AnsÃ¤tze von Kluckhohn/Strodtbeck und Hofstede und deren VerwendungsmÃ¶glichkeiten fÃ¼r Situationen des Kulturaustausches, Diplom-Arbeit, Fachbereich Sozialwissenschaften, UniversitÃ¤t GÃ¶ttingen, 1995.                ",
          "                    Hofstede, Geert: Culture`s Consequences. International Differences in Work-Related Values. Beverly Hills - London - New York, Sage Publications. 1980.                ",
          "                    Hofstede, Geert:Cultures and Organizations. Software of the Mind. London etc., McGraw-Hill Book Company, 1991.                ",
          "                    Hofstede, Geert: Interkulturelle Zusammenarbeit. Wiesbaden, Gabler, 1993.                ",
          "                    Katz, Noomi: : Individual learning style: Israeli norms and cross-cultural equivalence of Kolb\\'s Learning Style Inventory. In: Journal-of-Cross-Cultural-Psychology, 1988, S. 361-379.                ",
          "                    Kolb, David A.: The Learning Style Inventory. Technical Manual. Boston, Mass., 1976.                ",
          "                    Kolb, David A.: Learning Styles and Disciplinary Differences. In: Chickering, Arthur W. (Hrsg.), The Modern American College. San Francisco etc.. 1981, S. 232 - 255.                ",
          "                    Pask, Gordon: Styles and Strategies of Learning. In: British Journal of Educational Psychology. 1976, S. 128-148.                ",
          "                    Pask, Gordon: Learning Strategies, Teaching Strategies, and Conceptual or Learning Style. In: Schmeck, Ronald R. (Hrsg.), Learning Strategies and Learning Styles. New York - London, Plenum Press, 1988, S. 83-100.                ",
          "                    Quinn, N. & Holland, D., Culture and Cognition, in: Holland, D. & Quinn, N. (eds.), Cultural Models in Language and Thought. Cambridge MA 1987.                ",
          "                    Richardson, John T.E.: Cultural specifity of approaches to studying in higher education: A literature survey. In: Higher Education, 1994, S. 449-468.                ",
          "                    Sandhaas, Bernd: Lernen in Fremder Kultur.- Didaktische Orientierungen bei angehenden Hochschullehrern aus LÃ¤ndern der Dritten Welt im Auslandsstudium in der Bundesrepublik Deutschland. GÃ¶ttingen, Zentrum fÃ¼r didaktische Studien, 1988.                ",
          "                    Schank, R. & Abelson, R., Scripts, Plans, Goals, and Understanding: An Inquiry into Human Knowlege Structure, Hillsdale 1977.                ",
          "                    Schrader, Josef: Lerntypen bei Erwachsenen, empirische Analysen zum Lernen und Lehren in der beruflichen Weiterbildung. Weinheim, Dt. Studien-Verlag, 1994.                 ",
          "                    Tait, H. / Entwistle, N.: Identifying students at risk through ineffective study strategies. In: Higher Education, 31, 1996, S. 97-116.                "
        ]
      }
    }
  }
}
EOF;
